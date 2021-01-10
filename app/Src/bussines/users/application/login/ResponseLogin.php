<?php namespace App\Src\bussines\users\application\login;

final class ResponseLogin
{
    private $user;
    private $password;

    public function __construct($response)
    {
        //deben ser tipos primitivos :(
        $this->user = $response['usuario'];
        $this->password = $response['pass'];
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