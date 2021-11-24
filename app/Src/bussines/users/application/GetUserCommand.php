<?php namespace App\Src\bussines\users\application;

class GetUserCommand
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user; 
    }

    public function user()
    {
        return $this->user;
    }
}