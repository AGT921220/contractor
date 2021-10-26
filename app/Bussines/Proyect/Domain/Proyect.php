<?php

namespace App\Bussines\Proyect\Domain;

class Proyect
{

    private $proyectId;
    private $clientId;
    private $name;
    private $address;
    private $generalBudget;
    private $meters;
    private $employees;
    private $employeesFt;


    public function __construct(
        $proyectId = null,
        $clientId,
        $name,
        $address,
        $generalBudget,
        $meters,
        $employees,
        $employeesFt
    ) {
        $this->proyectId = $proyectId;
        $this->clientId = $clientId;
        $this->name = $name;
        $this->address = $address;
        $this->generalBudget = $generalBudget;
        $this->meters = $meters;
        $this->employees = $employees;
        $this->employeesFt = $employeesFt;
    }

    public function getId(): int
    {
        return $this->proyectId;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getAddress(): string
    {
        return $this->address;
    }

    public function getGeneralBudget(): float
    {
        return $this->generalBudget;
    }
    public function getMeters(): float
    {
        return $this->meters;
    }
    public function getEmployees(): int
    {
        return $this->employees;
    }
    public function getEmployeesFt(): int
    {
        return $this->employeesFt;
    }

}
