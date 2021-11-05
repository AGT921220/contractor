<?php

namespace App\Bussines\Contest\Application\Search;

use App\Bussines\Contest\Domain\ContestRepository;

class AvailableContestSearcher
{
    private $repository;

    public function __construct(ContestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $proyectId, int $scId)
    {
        return $this->repository->availableSearch($proyectId, $scId);
    }
}
