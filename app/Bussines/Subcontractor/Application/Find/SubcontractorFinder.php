<?php

namespace App\Bussines\Subcontractor\Application\Find;


use App\Bussines\Subcontractor\Domain\SubcontractorRepository;

class SubcontractorFinder
{
    private $repository;

    public function __construct(SubcontractorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $scId) 
    {
        return $this->repository->find($scId);
    }
}
