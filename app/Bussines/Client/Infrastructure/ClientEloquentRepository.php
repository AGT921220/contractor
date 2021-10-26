<?php

namespace App\Bussines\Client\Infrastructure;

use App\Bussines\Client\Domain\Client as DomainClient;
use App\Client;
use App\Bussines\Client\Domain\ClientRepository;

class ClientEloquentRepository implements ClientRepository
{

    public function create(DomainClient $client)
    {
        $model = new Client();
        $model->company=$client->getCompany();
        $model->rfc=$client->getRfc();
        $model->reg_patronal=$client->getRegPatronal();
        $model->rep_legal=$client->getRepLegal();
        $model->address=$client->getAddress();
        $model->email=$client->getEmail();
        $model->phone=$client->getPhone();

        $model->save();
        return $model->id;
    }
    

    public function search()
    {
        return Client::select('*')->get();
    }
}
