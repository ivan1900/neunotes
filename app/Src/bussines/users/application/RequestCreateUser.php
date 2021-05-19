<?php namespace App\Src\bussines\users\application;

class RequestCreateUser
{
    public function __construct(
        private $user = null,
        private $name = null,
        private $password= null,
        private $position= null,
        private $address=null,
        private $phone=null,
        private $email=null,
        private $active=true,
        private $language=null,
        private $role=null
    )
    {}
}