<?php

namespace App\Bussines\Subcontractor\Application\Create;

use App\Bussines\Subcontractor\Domain\Subcontractor;
use App\Bussines\Subcontractor\Domain\SubcontractorRepository;

class SubcontractorCreator
{
    private $repository;

    
    public function __construct(SubcontractorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        $name,
        $lname,
        $email,
        $phone,
        $pwd1,
        $photo = null
    ) {

        $subcontractor = new Subcontractor(
            null,
            $name,
            $lname,
            $email,
            $phone,
            $pwd1,
            $photo
        );

        $idSubcontractor = $this->repository->create($subcontractor);
        return $idSubcontractor;
    }
}
