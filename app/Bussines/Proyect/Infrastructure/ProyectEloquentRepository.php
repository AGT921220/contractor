<?php

namespace App\Bussines\Proyect\Infrastructure;

use App\Bussines\Proyect\Domain\Proyect as DomainProyect;
use App\Proyect;
use App\Bussines\Proyect\Domain\ProyectRepository;
use App\GeneralCatalog;

class ProyectEloquentRepository implements ProyectRepository
{

    public function create(DomainProyect $proyect)
    {
        $model = new Proyect();
        $model->client_id=$proyect->getClientId();
        $model->name=$proyect->getName();
        $model->address=$proyect->getAddress();
        $model->general_budget=$proyect->getGeneralBudget();
        $model->meters=$proyect->getMeters();
        $model->employees=$proyect->getEmployees();
        $model->employees_ft=$proyect->getEmployeesFt();
        $model->status=$proyect->getStatus();

        $model->save();
        return $model->id;
    }
    

    public function search()
    {
        $proyects = Proyect::select('proyects.*','clients.company as client')
        ->join('clients', 'proyects.client_id', 'clients.id')
        ->with('generalCatalogs')
        ->orderBy('proyects.id', 'asc')
        ->get();



        return $proyects->map(function ($proyect){
            $proyect->actions = $this->determineAction($proyect->status,$proyect->id, $proyect->generalCatalogs()->count());
            return $proyect;
        });


    }

    private function determineAction(string $status, int $proyectId, int $generalCatalogs): ?string
    {
        $action = '';
        switch ($status) {
            case DomainProyect::STATUS_CREATED:
                $action = '<a class="btn btn-info" href="/proyectos/'.$proyectId.'/catalogo-general/ver">'
                .DomainProyect::STATUS_CREATED_TEXT.'</a>';
                if($generalCatalogs>=1)
                {
                    $action .= '<a style="margin-top:5px;" class="btn btn-success" href="/proyectos/'.$proyectId.'/catalogo-general/ver">'
                    .DomainProyect::GENERATE_CONTEST.'</a>';
                }
                break;

                case DomainProyect::STATUS_OPEN:
                    $action = '';
                    break;
    
            default:

                break;
        }

        return $action;
    }
}
