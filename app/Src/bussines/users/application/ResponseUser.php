<?php namespace App\Src\bussines\users\application;

use Exception;

final class ResponseUser
{
    public static function new(...$args)
    {        
        return new self(...$args);
    }

    public function __construct(
        public $id,
        public $name,
        public $user,
        public $phone,
        public $email,
        public $active,
        public $address,
        public $position,
        public $created_at
    )
    {}
    
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