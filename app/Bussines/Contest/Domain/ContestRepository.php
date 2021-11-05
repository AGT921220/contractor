<?php

namespace App\Bussines\Contest\Domain;

interface ContestRepository
{
    public function search(int $proyectId);
    public function availableSearch(int $proyectId, int $scId);

    
}