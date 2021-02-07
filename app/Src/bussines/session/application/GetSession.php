<?php namespace App\Src\bussines\session\application;

use App\Src\bussines\session\domain\EntitySession;

final class GetSession
{
    public static function entity()
    {
        $session = new EntitySession(
            $_SESSION['userName'],
            $_SESSION['language'],
            $_SESSION['userUuid'],
            isset($_SESSION['isUserAdmin']) ? $_SESSION['isUserAdmin'] : null);
        return $session;
    }
}