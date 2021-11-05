<?php

namespace App\Bussines\Proyect\Application\SubcontractorSearch;


use App\Bussines\Proyect\Domain\ProyectRepository;

class SubcontractorProyectSearcher
{
    private $repository;

    public function __construct(ProyectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $scId) {
        return $this->repository->subcontractorProyectSearch($scId);
    }
}
