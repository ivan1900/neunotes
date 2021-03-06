<?php namespace App\Src\bussines\users\domain\login;

use App\Src\bussines\users\domain\UserName;
use App\Src\bussines\users\domain\UserPassword;
use App\Src\bussines\users\domain\UserUuid;
final class LoginAssembly
{
    private $user;
    private $password;
    private $uuid;

    public function __construct($values)
    {
        //deben ser tipos primitivos :(
        $this->user = UserName::fromValues($values->user());
        $this->password = UserPassword::fromValues($values->password());
        $this->uuid = UserUuid::fromValues($values->uuid());
    }

    public function user()
    {
        return $this->user;
    }

    public function password()
    {
        return $this->password;
    }

    public function uuid()
    {
        return $this->uuid;
    }
}