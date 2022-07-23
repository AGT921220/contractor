<?php

namespace App\Bussines\Client\Domain;

class Client
{

    private $id;
    private $company;
    private $rfc;
    private $regPatronal;
    private $repLegal;
    private $address;
    private $email;
    private $phone;


    public function __construct(
        $id = null,
        $company,
        $rfc,
        $regPatronal,
        $repLegal,
        $address,
        $email,
        $phone
    ) {
        $this->id = $id;
        $this->company = $company;
        $this->rfc = $rfc;
        $this->regPatronal = $regPatronal;
        $this->repLegal = $repLegal;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCompany(): string
    {
        return $this->company;
    }
    public function getRfc(): string
    {
        return $this->rfc;
    }
    public function getRegPatronal(): string
    {
        return $this->regPatronal;
    }

    public function getRepLegal(): string
    {
        return $this->repLegal;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }

}
