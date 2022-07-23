<?php

namespace App\Bussines\Proyect\Application\Search;


use App\Bussines\Proyect\Domain\ProyectRepository;

class ProyectSearcher
{
    private $repository;

    public function __construct(ProyectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke() {

        return $this->repository->search();
    }
}
