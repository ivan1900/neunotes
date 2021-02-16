<?php namespace App\Src\bussines\users\application;

final class ResponseUser
{
    public function __construct($values)
    {
        $this->uuid = $values->uuid;
        $this->name = $values->nombre;
        $this->user = $values->usuario;
        $this->password = $values->pass;
        $this->phone = $values->telefono;
        $this->email = $values->mail;
        $this->address = $values->direccion;
        $this->position = $values->cargo;
    }
    
    public function uuid()
    {
        return $this->uuid;
    }

    public function name()
    {
        return $this->name;
    }

    public function password()
    {
        return $this->password;
    }

    public function phone()
    {
        return $this->phone;
    }

    public function email()
    {
        return $this->email;
    }

    public function address()
    {
        return $this->address;
    }

    public function position()
    {
        return $this->position;
    }
}