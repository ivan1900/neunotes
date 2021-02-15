<?php namespace App\Src\bussines\users\application;

final class ResponseUser
{
    public function __construct(
        $uuid,
        $name,
        $user,
        $password,
        $phone,
        $email,
        $address,
        $position,
    ){}
    
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