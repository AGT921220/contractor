<?php

namespace App\Bussines\GeneralCatalog\Infrastructure;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog as DomainGeneralCatalog;
use App\GeneralCatalog;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;
use App\Bussines\Proyect\Domain\Proyect as DomainProyect;
use App\Imports\GeneralCatalogImports;
use App\MeasurementUnits;
use App\Proyect;
//use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

class GeneralCatalogEloquentRepository implements GeneralCatalogRepository
{

    public function search($proyectId)
    {
        return GeneralCatalog::select('general_catalogs.*', 'measurement_units.abbreviation as units')
            ->join('measurement_units', 'general_catalogs.measurement_units_id', 'measurement_units.id')
            ->where('proyect_id', $proyectId)->get();
    }

    public function import($request, $proyectId, $gcCreator)
    {
        Excel::import(new GeneralCatalogImports($proyectId,auth()->user()->id, MeasurementUnits::get(), $gcCreator),$request->file('generalCatalog'));
        $model = Proyect::where('id', $proyectId)->first();
        $model->status = DomainProyect::STATUS_OPEN;
        $model->save();

    }

    public function create(DomainGeneralCatalog $generalCatalog): void
    {
        $model = new GeneralCatalog();
        $model->proyect_id = $generalCatalog->getProyectId();
        $model->user_id = $generalCatalog->getUserId();
        $model->area = $generalCatalog->getArea();
        $model->subarea = $generalCatalog->getSubarea();
        $model->clave = $generalCatalog->getClave();
        $model->description = $generalCatalog->getDescription();
        $model->measurement_units_id = $generalCatalog->getMeasurementUnitId();
        $model->quantity = $generalCatalog->getQuantity();
        $model->unit_price = $generalCatalog->getUnitPrice();
        $model->total = $generalCatalog->getTotal();

        $model->save();
        return;
    }
}
