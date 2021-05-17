<?php namespace App\Src\bussines\users\application;

class RequestCreateUser
{
    public function __construct(
        private $user
    )
    {}
}