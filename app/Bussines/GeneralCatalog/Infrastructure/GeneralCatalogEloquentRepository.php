<?php

namespace App\Bussines\GeneralCatalog\Infrastructure;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog as DomainGeneralCatalog;
use App\GeneralCatalog;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;
use App\Imports\GeneralCatalogImports;
use App\MeasurementUnits;

use Maatwebsite\Excel\Facades\Excel;

class GeneralCatalogEloquentRepository implements GeneralCatalogRepository
{

    public function search($proyectId)
    {
        $generalCatalogs = GeneralCatalog::select('general_catalogs.*', 'measurement_units.abbreviation as units')
            ->join('measurement_units', 'general_catalogs.measurement_units_id', 'measurement_units.id')
            //            ->join('proyects', 'general_catalogs.proyect_id', 'proyects.id')
            ->where('proyect_id', $proyectId)->get();
        return $generalCatalogs->map(function ($generalCatalog) {
            $generalCatalog->actions = $this->determineAction($generalCatalog->proyect_id, $generalCatalog->id);
            return $generalCatalog;
        });
    }

    public function import($request, $proyectId, $gcCreator)
    {
        Excel::import(new GeneralCatalogImports($proyectId, auth()->user()->id, MeasurementUnits::get(), $gcCreator), $request->file('generalCatalog'));
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

    private function determineAction($proyectId, $generalCatalogId): ?string
    {
        $action = '<a class="btn btn-warning" href="/proyectos/' . $proyectId . '/catalogo-general/' . $generalCatalogId . '/editar">'
            . DomainGeneralCatalog::EDIT_TEXT . '</a>'
            //                <a class="btn btn-info" href="/proyectos/'.$proyectId.'/catalogo-general/ver">'.GeneralCatalog::SHOW.'</a>'
        ;

        // switch ($status) {    
        //     default:
        //         break;
        // }

        return $action;
    }

    public function find($proyectId, $generalCatalogId): DomainGeneralCatalog
    {
        $model = GeneralCatalog::where('proyect_id', $proyectId)
            ->where('id', $generalCatalogId)
            ->first();

        return new DomainGeneralCatalog(
            $model->id,
            $model->proyect_id,
            $model->user_id,
            $model->area,
            $model->subarea,
            $model->clave,
            $model->description,
            $model->measurement_units_id,
            $model->quantity,
            $model->unit_price,
        );
    }

    public function update(DomainGeneralCatalog $generalCatalog): void
    {

        $model = GeneralCatalog::find($generalCatalog->getId());
        $model->area = $generalCatalog->getarea();
        $model->subarea = $generalCatalog->getSubarea();
        $model->description = $generalCatalog->getDescription();
        $model->unit_price = $generalCatalog->getUnitPrice();
        $model->quantity = $generalCatalog->getQuantity();
        $model->save();
    }
}
