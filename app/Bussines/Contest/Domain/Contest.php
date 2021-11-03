<?php

namespace App\Bussines\Contest\Domain;

class Contest
{

    public const STATUS_INACTIVE='Inactivo';
    public const STATUS_ACTIVE ='Activo';    


    private $cId;
    private $proyectId;
    private $userId;
    private $name;
    private $generalCatalogs;

    public function __construct(
        $cId = null,
        $proyectId,
        $userId,
        $name,
        $generalCatalogs
    ) {
        $this->gcId = $cId;
        $this->proyectId = $proyectId;
        $this->userId = $userId;
        $this->name = $name;
        $this->generalCatalogs = $generalCatalogs;

    }

    public function getId(): int
    {
        return $this->cId;
    }

    public function getProyectId(): int
    {
        return $this->proyectId;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getGeneralCatalogs(): array
    {
        return $this->generalCatalogs;
    }

}
