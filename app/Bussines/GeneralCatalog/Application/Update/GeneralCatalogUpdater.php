<?php

namespace App\Bussines\GeneralCatalog\Application\Update;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;

class GeneralCatalogUpdater
{

    private $repository;

    public function __construct(GeneralCatalogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($newAttributes, $proyectId, $generalCatalogId)
    {

        $generalCatalog = $this->repository->find($proyectId, $generalCatalogId);

        $domainGeneralCatalog = new GeneralCatalog(
            $generalCatalog->getId(),
            $generalCatalog->getProyectId(),
            $generalCatalog->getUserId(),
            $newAttributes['area'],
            $newAttributes['subarea'],
            $newAttributes['clave'],
            $newAttributes['description'],
            $generalCatalog->getMeasurementUnitId(),
            $newAttributes['unit_price'],
            $newAttributes['quantity']
        );

        $this->repository->update($domainGeneralCatalog);
    }
}
