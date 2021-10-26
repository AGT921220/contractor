<?php

namespace App\Bussines\Proyect\Application\Create;

use App\Bussines\Proyect\Domain\Proyect;
use App\Bussines\Proyect\Domain\ProyectRepository;

class ProyectCreator
{
    private $repository;

    public function __construct(ProyectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        $proyectId,
        $name,
        $address,
        $generalBudget,
        $meters,
        $employees,
        $employeesFt
    ) {

        $proyect = new Proyect(
            null,
            $proyectId,
            $name,
            $address,
            $generalBudget,
            $meters,
            $employees,
            $employeesFt
        );

        $idProyect = $this->repository->create($proyect);
        return $idProyect;
    }
}
