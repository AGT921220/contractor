<?php

namespace App\Bussines\Proyect\Domain;

class Proyect
{
    public const STATUS_CREATED='created';//Boton Cargar catalogo(conceptos) y Eliminar
    public const STATUS_OPEN='open';
    public const STATUS_CONTEST='contest';//Tiene que tener contratistas creados
    public const STATUS_BUILD='build'; //Se pueden aceptar más contest(Abrir o Cerrar)
    public const STATUS_TERMINATE ='terminate';

    public const STATUS_CREATED_TEXT= 'Cargar Catálogos';


    private $proyectId;
    private $clientId;
    private $name;
    private $address;
    private $generalBudget;
    private $meters;
    private $employees;
    private $employeesFt;
    private $status;


    public function __construct(
        $proyectId = null,
        $clientId,
        $name,
        $address,
        $generalBudget,
        $meters,
        $employees,
        $employeesFt,
        $status
    ) {
        $this->proyectId = $proyectId;
        $this->clientId = $clientId;
        $this->name = $name;
        $this->address = $address;
        $this->generalBudget = $generalBudget;
        $this->meters = $meters;
        $this->employees = $employees;
        $this->employeesFt = $employeesFt;
        $this->status = $status;
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

    public function getStatus(): string
    {
        return $this->status;
    }


}
