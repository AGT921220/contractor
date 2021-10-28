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
        $clientId,
        $name,
        $address,
        $generalBudget,
        $meters,
        $employees,
        $employeesFt
    ) {

        $proyect = new Proyect(
            null,
            $clientId,
            $name,
            $address,
            $generalBudget,
            $meters,
            $employees,
            $employeesFt,
            Proyect::STATUS_CREATED
        );

        $idProyect = $this->repository->create($proyect);
        return $idProyect;
    }
}
