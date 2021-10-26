<?php

namespace App\Bussines\Client\Application\Search;

use App\Bussines\Client\Domain\Client;
use App\Bussines\Client\Domain\ClientRepository;

class ClientSearcher
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke() {

        return $this->repository->search();
    }
}
