<?php

namespace App\Bussines\GeneralCatalog\Application\Find;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;

class GeneralCatalogFinder
{
    private $repository;

    public function __construct(GeneralCatalogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($proyectId, $generalCatalogId) {
        return $this->repository->find($proyectId, $generalCatalogId);
    }
}
