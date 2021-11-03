<?php

namespace App\Bussines\Contest\Domain;

interface ContestRepository
{
    public function search(int $proyectId);
}