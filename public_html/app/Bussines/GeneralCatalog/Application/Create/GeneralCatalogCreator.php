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
        $userId,
        $area,
        $subarea,
        $clave,
        $desription,
        $measurementUnitId,
        $quantity,
        $unitPrice
    ) {

        $generalCatalog = new GeneralCatalog(
            null,
            $proyectId,
            $userId,
            $area,
            $subarea,
            $clave,
            $desription,
            $measurementUnitId,
            $quantity,
            $unitPrice
        );

         $this->repository->create($generalCatalog);
    }
}
