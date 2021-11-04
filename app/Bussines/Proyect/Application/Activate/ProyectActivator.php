<?php

namespace App\Bussines\Proyect\Application\Activate;

use App\Bussines\Proyect\Domain\Proyect;
use App\Bussines\Proyect\Domain\ProyectRepository;

class ProyectActivator
{
    private $repository;

    public function __construct(ProyectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        $proyectId
    ) {
        $proyect = $this->repository->find($proyectId);

        $proyect->activate();
        return $this->repository->store($proyect);
    }
}
