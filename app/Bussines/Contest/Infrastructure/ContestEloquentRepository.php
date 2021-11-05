<?php

namespace App\Bussines\Contest\Infrastructure;

use App\Bussines\Contest\Domain\Contest as DomainContest;
use App\Contest;
use App\Bussines\Contest\Domain\ContestRepository;
use App\Bussines\GeneralCatalog\Application\Search\GeneralCatalogSearcher;
use App\ContestGeneralCatalog;
use App\Proyect;

class ContestEloquentRepository implements ContestRepository
{
    private $gcSearcher;



    public function __construct(GeneralCatalogSearcher $gcSearcher)
    {
        $this->gcSearcher = $gcSearcher;
    }

    public function search($proyectId)
    {
        if (!Contest::where('proyect_id', $proyectId)->exists()) {
            $generalCatalogs = $this->gcSearcher->__invoke($proyectId);
            $this->createDefaultContests($proyectId, $generalCatalogs->groupBy('area'));
        }

        $contests = Contest::where('proyect_id', $proyectId)
        ->with('generalCatalogs')
        ->get();

        return $contests->map(function ($contest) {
            $generalCatalogs =[];
            foreach ($contest->generalCatalogs as $item) {
                $generalCatalogs[] = $item->generalCatalogs;
            }
            return new DomainContest(
                $contest->id,
                $contest->proyect_id,
                $contest->user_id,
                $contest->name,
                $generalCatalogs
            );
        });
    }

    private function createDefaultContests(int $proyectId, $generalCatalogs): void
    {
        $userId= auth()->user()->id;
        foreach ($generalCatalogs as $generalCatalog=>$items) {
            $contest = new Contest();
            $contest->name= $generalCatalog;
            $contest->proyect_id=$proyectId;
            $contest->user_id=$userId;
            $contest->status = DomainContest::STATUS_INACTIVE;
            $contest->save();

            $this->createDefaultContestGeneralCatalogs($proyectId, $contest->id, $items, $userId);
        }
    }

    private function createDefaultContestGeneralCatalogs($proyectId, $contestId, $generalCatalogs, $userId):void
    {
        foreach ($generalCatalogs as $generalCatalog) {
            $model = new ContestGeneralCatalog();
            $model->proyect_id=$proyectId;
            $model->user_id=$userId;
            $model->general_catalog_id = $generalCatalog->id;
            $model->contest_id=$contestId;
            $model->save();
        }
    }

    public function availableSearch(int $proyectId, int $scId)
    {
        $contests = Contest::select('contests.name', 'contests.id')
        ->join('proyects', 'proyects.id', 'contests.proyect_id')
        ->join('user_contests', 'user_contests.contest_id', '!=', 'contests.id')
        ->where('user_contests.user_id', $scId)
        ->where('proyect_id', $proyectId)
        ->get();
        return $contests;
    }
}
