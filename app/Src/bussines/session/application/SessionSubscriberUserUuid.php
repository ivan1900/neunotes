<?php namespace App\Src\bussines\session\application;

class SessionSubscriberUserUuid
{
    public static function handle($userUuid)
    {
        $_SESSION['userUuid']=$userUuid;
    }

}