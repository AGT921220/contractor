<?php

namespace App\Bussines\Subcontractor\Infrastructure;

use App\Bussines\Subcontractor\Domain\Subcontractor as DomainSubcontractor;
use App\Subcontractor;
use App\Bussines\Subcontractor\Domain\SubcontractorRepository;
use App\GeneralCatalog;
use App\User;
use Illuminate\Support\Facades\Hash;

class SubcontractorEloquentRepository implements SubcontractorRepository
{
    public function create(DomainSubcontractor $subcontractor)
    {
        $model = new User();
        $model->name = $subcontractor->getName();
        $model->lname = $subcontractor->getLname();

        $model->email = $subcontractor->getEmail();
        $model->phone = $subcontractor->getPhone();
        $model->password = Hash::make($subcontractor->getPassword());
        $model->user_type = $subcontractor->getUserType();
        $photo = 'images/profile-empty.png';

        if ($subcontractor->getPhoto()) {
            $file = $subcontractor->getPhoto();
            $filename = time() . $subcontractor->getPhoto()->getClientOriginalName();
            $file->move(public_path() . '/images/profiles', $filename);
            $photo = 'images/profiles/' . $filename;
        }

        $model->photo = $photo;


        $model->save();
        return $model->id;
    }


    public function search()
    {
        $subcontractors = User::where('user_type', User::SUBCONTRATISTA)
            ->get();

        return $subcontractors->map(function ($subcontractor) {
            return new DomainSubcontractor(
                $subcontractor->id,
                $subcontractor->name,
                $subcontractor->lname,
                $subcontractor->email,
                $subcontractor->phone,
                null,
                $subcontractor->photo
            );
        });
    }

    public function find(int $scId):DomainSubcontractor
    {
        $subcontractor = User::where('user_type', User::SUBCONTRATISTA)
        ->where('id', $scId)
        ->first();

        return new DomainSubcontractor(
            $subcontractor->id,
            $subcontractor->name,
            $subcontractor->lname,
            $subcontractor->email,
            $subcontractor->phone,
            null,
            $subcontractor->photo
        );
    }
}
