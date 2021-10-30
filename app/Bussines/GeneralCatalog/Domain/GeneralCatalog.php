<?php

namespace App\Bussines\GeneralCatalog\Domain;

class GeneralCatalog
{
    public const EDIT_TEXT ='Editar Partida';


    private $gcId;
    private $proyectId;
    private $userId;
    private $area;
    private $subarea;
    private $clave;
    private $description;
    private $measurementUnitId;
    private $quantity;
    private $unitPrice;


    public function __construct(
        $gcId = null,
        $proyectId,
        $userId,
        $area,
        $subarea,
        $clave,
        $description,
        $measurementUnitId,
        $quantity,
        $unitPrice
    ) {
        $this->gcId = $gcId;
        $this->proyectId = $proyectId;
        $this->userId = $userId;
        $this->area = $area;
        $this->subarea = $subarea;
        $this->clave = strtoupper($clave);
        $this->description = ltrim($description);
        $this->measurementUnitId = $measurementUnitId;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
    }

    public function getId(): int
    {
        return $this->gcId;
    }

    public function getProyectId(): int
    {
        return $this->proyectId;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }
    public function getArea(): string
    {
        return $this->area;
    }
    public function getSubarea(): ?string
    {
        return $this->subarea;
    }
    public function getClave(): string
    {
        return $this->clave;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getMeasurementUnitId(): int
    {
        return $this->measurementUnitId;
    }
    public function getQuantity(): float
    {
        return $this->quantity;
    }
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function getTotal(): float
    {
        return $this->unitPrice * $this->quantity;
    }

}
