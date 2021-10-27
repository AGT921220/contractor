<?php

namespace App\Bussines\GeneralCatalog\Infrastructure;

use App\Bussines\GeneralCatalog\Domain\GeneralCatalog as DomainGeneralCatalog;
use App\GeneralCatalog;
use App\Bussines\GeneralCatalog\Domain\GeneralCatalogRepository;

class GeneralCatalogEloquentRepository implements GeneralCatalogRepository
{

    public function create(DomainGeneralCatalog $proyect)
    {
        $model = new DomainGeneralCatalog();
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
        $items = GeneralCatalog::select('proyects.*','clients.company as client')
        ->join('clients', 'clients.id', 'proyects.client_id')
        ->get();

        $proyects = [];
        foreach($items as $item)
        {
            $item->actions = $this->determineAction($item->status);
            $proyects[] = $item;
        
        }
        return $proyects;
    }

    private function determineAction($status): ?string
    {
        $action = '';
        switch ($status) {
            case DomainGeneralCatalog::STATUS_CREATED:
                $action = '<button class="btn btn-primary">'.DomainGeneralCatalog::STATUS_CREATED_TEXT.'</button>';
                break;
            
            default:

                break;
        }

        return $action;
    }
}
