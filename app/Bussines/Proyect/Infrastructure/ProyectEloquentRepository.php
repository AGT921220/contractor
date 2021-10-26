<?php

namespace App\Bussines\Proyect\Infrastructure;

use App\Bussines\Proyect\Domain\Proyect as DomainProyect;
use App\Proyect;
use App\Bussines\Proyect\Domain\ProyectRepository;

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

        $model->save();
        return $model->id;
    }
    

    public function search()
    {
        return Proyect::select('proyects.*','clients.company as client')
        ->join('clients', 'clients.id', 'proyects.client_id')
        ->get();
    }
}
