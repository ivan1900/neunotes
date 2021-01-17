<?php namespace App\Src\bussines\users\domain\login;

use App\Src\bussines\users\domain\UserName;
use App\Src\bussines\users\domain\UserPassword;
use App\Src\bussines\users\domain\UserUuid;

final class LoginAssemblyRequest
{
    private $user;
    private $password;
  
    public function __construct($values)
    {
        //deben ser tipos primitivos :(
        $this->user = UserName::fromValues($values->user());
        $this->password = UserPassword::fromValues($values->password());
    }

    public function user()
    {
        return $this->user;
    }

    public function password()
    {
        return $this->password;
    }
}