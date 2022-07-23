<?php

namespace App\Bussines\GeneralCatalog\Application\Importer;

use App\Bussines\GeneralCatalog\Application\Create\GeneralCatalogCreator;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;

class GeneralCatalogImporter
{
    private $repository;
    private $gcCreator;

    public function __construct(GeneralCatalogRepository $repository, GeneralCatalogCreator $gcCreator)
    {
        $this->repository = $repository;
        $this->gcCreator = $gcCreator;
    }

    public function __invoke($request, $proyectId) {
        return $this->repository->import($request, $proyectId, $this->gcCreator);
    }
}
