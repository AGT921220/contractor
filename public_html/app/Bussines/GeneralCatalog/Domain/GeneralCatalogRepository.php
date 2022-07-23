<?php

namespace App\Bussines\GeneralCatalog\Domain;

use App\Bussines\GeneralCatalog\Application\Create\GeneralCatalogCreator;
use App\Http\Requests\GeneralCatalog\StoreGeneralCatalogRequest;

interface GeneralCatalogRepository
{
    public function search(int $proyectId);
    public function create(GeneralCatalog $generalCatalog):void;
    public function import(StoreGeneralCatalogRequest $request,int $proyectId, GeneralCatalogCreator $gcCreator);
    public function find(int $proyectId, int $generalCatalogId);
    public function update(GeneralCatalog $generalCatalog):void;
}