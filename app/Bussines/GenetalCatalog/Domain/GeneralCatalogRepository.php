<?php

namespace App\Bussines\GeneralCatalog\Domain;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog as DomainGeneralCatalog;

interface GeneralCatalogRepository
{
    public function create(DomainGeneralCatalog $proyect);
    public function search();
}