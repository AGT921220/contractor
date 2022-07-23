<?php

namespace App\Bussines\GeneralCatalog\Application\Search;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;

class GeneralCatalogSearcher
{
    private $repository;

    public function __construct(GeneralCatalogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($proyectId) {
        return $this->repository->search($proyectId);
    }
}
