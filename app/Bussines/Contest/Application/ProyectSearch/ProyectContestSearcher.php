<?php

namespace App\Bussines\Contest\Application\ProyectSearch;

use App\Bussines\Contest\Domain\ContestRepository;

class ProyectContestSearcher
{
    private $repository;

    public function __construct(ContestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($scId)
    {
        return $this->repository->proyectSearch($scId);
    }
}
