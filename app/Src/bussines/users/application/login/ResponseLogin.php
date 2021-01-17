<?php namespace App\Src\bussines\users\application\login;

final class ResponseLogin
{
    private $user;
    private $password;
    private $uuid;

    public function __construct($response)
    {
        //deben ser tipos primitivos :(
        $this->user = $response['usuario'];
        $this->password = $response['pass'];
        $this->uuid = $response['uuid'];
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