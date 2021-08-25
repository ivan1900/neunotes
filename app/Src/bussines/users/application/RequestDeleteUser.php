<?php namespace App\Src\bussines\users\application;

class RequestDeleteUser
{
    public function __construct(
        private $id
    )
    {}

    public function id()
    {
        return $this->id;
    }
}