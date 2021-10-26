<?php

namespace App\Bussines\Client\Domain;

use App\Bussines\Client\Domain\Client as DomainClient;

interface ClientRepository
{
    public function create(DomainClient $client);
    public function search();
}