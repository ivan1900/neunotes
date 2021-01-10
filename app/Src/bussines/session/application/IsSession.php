<?php namespace App\Src\bussines\session\application;

final class IsSession
{
    public static function result()
    {
        $res = (isset($_SESSION['userName'])) ? TRUE : FALSE;
        return $res;
    }
}