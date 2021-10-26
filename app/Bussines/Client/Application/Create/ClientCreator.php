<?php

namespace App\Bussines\Client\Application\Create;

use App\Bussines\Client\Domain\Client;
use App\Bussines\Client\Domain\ClientRepository;

class ClientCreator
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        $company,
        $rfc,
        $regPatronal,
        $repLegal,
        $address,
        $email,
        $phone
    ) {

        $client = new Client(
            null,
            $company,
            $rfc,
            $regPatronal,
            $repLegal,
            $address,
            $email,
            $phone
        );

        $idClient = $this->repository->create($client);
        return $idClient;
    }
}
