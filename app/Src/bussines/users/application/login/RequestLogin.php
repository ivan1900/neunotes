<?php namespace App\Src\bussines\users\application\login;

final class RequestLogin
{
    private $user;
    private $password;

    public function __construct($request)
    {
         $this->user = $request['user'];
        $this->password = $request['pass'];
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