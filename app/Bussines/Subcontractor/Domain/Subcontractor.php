<?php

namespace App\Bussines\Subcontractor\Domain;

use App\User;

class Subcontractor
{


    private $scId;
    private $name;
    private $lname;
    private $email;
    private $phone;
    private $pwd1;
    private $photo;


    public function __construct(
        $scId = null,
        $name,
        $lname,
        $email,
        $phone,
        $pwd1 = null,
        $photo
    ) {
        $this->scId = $scId;
        $this->name = $name;
        $this->lname = $lname;
        $this->email = $email;
        $this->phone = $phone;
        $this->pwd1 = $pwd1;
        $this->photo = $photo;
    }
    public function toArray()
    {
        return
        [
            'id'=>$this->scId,
            'name'=>$this->name,
            'lname'=>$this->lname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'photo'=>$this->photo
        ];
    }
    public function getId(): int
    {
        return $this->scId;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getLname(): string
    {
        return $this->lname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getPassword(): ?string
    {
        return $this->pwd1;
    }
    public function getUserType():string
    {
        return User::SUBCONTRATISTA;
    }
}
