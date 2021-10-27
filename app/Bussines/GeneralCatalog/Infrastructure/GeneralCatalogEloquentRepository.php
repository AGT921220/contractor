<?php

namespace App\Bussines\GeneralCatalog\Infrastructure;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog as DomainGeneralCatalog;
use App\GeneralCatalog;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;
use Illuminate\Support\Collection;

class GeneralCatalogEloquentRepository implements GeneralCatalogRepository
{

    public function search($proyectId)
    {
        return GeneralCatalog::
        select('general_catalogs.*','measurement_units.abbreviation as units')
        ->join('measurement_units', 'general_catalogs.measurement_units_id', 'measurement_units.id')
        ->where('proyect_id',$proyectId)->get();
    }
}
