<?php

namespace App\Bussines\Proyect\Application\Find;

use App\Bussines\Proyect\Domain\ProyectRepository;

class ProyectFinder
{
    private $repository;

    public function __construct(ProyectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($proyectId) {
        return $this->repository->find($proyectId);
    }
}
