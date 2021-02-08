<?php namespace App\Src\bussines\session\application;

class SessionIsUserAdmin
{
    public static function handle($IsUserAdmin)
    {
        $_SESSION['isUserAdmin']=$IsUserAdmin;
    }

}