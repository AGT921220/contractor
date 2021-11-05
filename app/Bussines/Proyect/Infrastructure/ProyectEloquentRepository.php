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
    
    public function find(int $proyectId): DomainProyect
    {
        $model = Proyect::where('id', $proyectId)
        ->first();

        return new DomainProyect(
            $model->id,
            $model->client_id,
            $model->name,
            $model->address,
            $model->general_budget,
            $model->meters,
            $model->employees,
            $model->employees_ft,
            $model->status,
        );
    }

    public function search()
    {
        $proyects = Proyect::select('proyects.*', 'clients.company as client')
        ->join('clients', 'proyects.client_id', 'clients.id')
        ->with('generalCatalogs')
        ->with('contests')
        ->orderBy('proyects.id', 'asc')
        ->get();



        return $proyects->map(function ($proyect) {
            $proyect->actions = $this->determineAction($proyect->status, $proyect->id, $proyect->generalCatalogs()->count());
            return $proyect;
        });
    }

    public function store(DomainProyect $proyect): DomainProyect
    {
        $model = Proyect::where('id', $proyect->getId())
        ->first();

        $model->client_id=$proyect->getClientId();
        $model->name=$proyect->getName();
        $model->address=$proyect->getAddress();
        $model->general_budget=$proyect->getGeneralBudget();
        $model->meters=$proyect->getMeters();
        $model->employees=$proyect->getEmployees();
        $model->employees_ft=$proyect->getEmployeesFt();
        $model->status=$proyect->getStatus();
        $model->save();

        return new DomainProyect(
            $model->id,
            $model->client_id,
            $model->name,
            $model->address,
            $model->general_budget,
            $model->meters,
            $model->employees,
            $model->employees_ft,
            $model->status,
        );
    }
    private function determineAction(string $status, int $proyectId, int $generalCatalogs): ?string
    {
        $action = '';
        switch ($status) {
            case DomainProyect::STATUS_CREATED:
                $action = '<a class="btn btn-info" href="/proyectos/'.$proyectId.'/catalogo-general/ver">'
                .DomainProyect::STATUS_CREATED_TEXT.'</a>';
                if ($generalCatalogs>=1) {
                    $action .= '<a style="margin-top:5px;" class="btn btn-success" href="/proyectos/'.$proyectId.'/concursos/ver">'
                    .DomainProyect::GENERATE_CONTEST.'</a>';
                }

                // if($contests>=1)
                // {
                //     $action .= ' <form method="POST" action="/proyectos/'.$proyectId.'/activate" enctype="multipart/form-data">
                //     <button class="btn btn-primary btn-block" type="submit">'.DomainProyect::ACTIVATE_PROYECT.'</button>
                //     </form>';
                // }
                break;

                case DomainProyect::STATUS_ACTIVE:
                    $action = '';
                    break;
    
            default:

                break;
        }

        return $action;
    }

    public function subcontractorProyectSearch(int $scId)
    {

        $proyects = Proyect::
        select('proyects.name as proyect', 'proyects.status as proyect_status', 'contests.name as contest','contests.status as contest_status')
        ->join('contests', 'contests.proyect_id', 'proyects.id')
        ->join('user_contests', 'user_contests.contest_id', 'contests.id')
        ->where('user_contests.user_id', $scId)
        ->get();
        return $proyects;
    }

    public function activeProyectSearch()
    {
        $proyects = Proyect::
        where('status',DomainProyect::STATUS_ACTIVE)
        ->get();
        return $proyects;
    }
}
