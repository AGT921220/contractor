<?php

namespace App\Bussines\Subcontractor\Application\Search;


use App\Bussines\Subcontractor\Domain\SubcontractorRepository;

class SubcontractorSearcher
{
    private $repository;

    public function __construct(SubcontractorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke() {

        return $this->repository->search();
    }
}
