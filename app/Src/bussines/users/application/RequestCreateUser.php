<?php namespace App\Src\bussines\users\application;

class RequestCreateUser
{
    public function __construct(
        public $user,
        public $name,
        public $password,
        public $position,
        public $address,
        public $phone,
        public $email,
        public $language,
        public $role,
        public $timezone,
        public $active=true
    )
    {}

}