<?php namespace App\Src\bussines\session\application;

class SessionSubscriberUserName
{
    public static function handle($userName)
    {
        $_SESSION['userName']=$userName;
    }

}