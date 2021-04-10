<?php namespace App\Src\bussines\users\application;

class RequestUser
{
    public function __construct(
        private $user
    )
    {}

    public function user()
    {
        return $this->user;
    }
}