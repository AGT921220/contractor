<?php

namespace App\Bussines\Proyect\Domain;

use App\Bussines\Proyect\Domain\Proyect as DomainProyect;

interface ProyectRepository
{
    public function create(DomainProyect $proyect);
    public function search();
}