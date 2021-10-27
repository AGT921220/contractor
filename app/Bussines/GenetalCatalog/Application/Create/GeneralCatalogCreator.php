<?php

namespace App\Bussines\GeneralCatalog\Application\Create;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;

class GeneralCatalogCreator
{
    private $repository;

    public function __construct(GeneralCatalogRepository $repository)
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

        $proyect = new GeneralCatalog(
            null,
            $proyectId,
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
