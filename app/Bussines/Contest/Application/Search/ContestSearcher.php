<?php

namespace App\Bussines\Contest\Application\Search;

use App\Bussines\Contest\Domain\ContestRepository;

class ContestSearcher
{
    private $repository;

    public function __construct(ContestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($proyectId)
    {
        return $this->repository->search($proyectId);
    }
}
