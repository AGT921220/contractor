<?php

namespace App\Bussines\Subcontractor\Domain;

use App\Bussines\Subcontractor\Domain\Subcontractor as DomainSubcontractor;

interface SubcontractorRepository
{
    public function create(DomainSubcontractor $subcontractor);
    public function search();
    public function find(int $scId):DomainSubcontractor;
}