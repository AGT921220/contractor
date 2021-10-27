<?php

namespace App\Bussines\GeneralCatalog\Domain;

use Illuminate\Support\Collection;

interface GeneralCatalogRepository
{
    public function search(int $proyectId);
}