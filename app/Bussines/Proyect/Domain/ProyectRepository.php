<?php

namespace App\Bussines\Proyect\Domain;

use App\Bussines\Proyect\Domain\Proyect as DomainProyect;

interface ProyectRepository
{
    public function create(DomainProyect $proyect);
    public function find(int $proyectId):DomainProyect;
    public function store(DomainProyect $proyect):DomainProyect;
    public function search();
    public function subcontractorProyectSearch(int $scId);
    public function activeProyectSearch();
   
}