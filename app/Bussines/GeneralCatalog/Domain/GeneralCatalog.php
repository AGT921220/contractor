<?php

namespace App\Bussines\GeneralCatalog\Domain;

class GeneralCatalog
{


    private $proyectId;


    public function __construct(
        $proyectId = null
    ) {
        $this->proyectId = $proyectId;
    }

    public function getId(): int
    {
        return $this->proyectId;
    }
}
