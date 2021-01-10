<?php namespace App\Src\bussines\session\application;

final class SessionExceptionMessage
{
    public static function setHackExceptionMessage($message)
    {
        $_SESSION['exceptionMessage']= $message;
    }

    public function getExceptionMessage():string
    {
        if (isset($_SESSION['exceptionMessage'])){
            $exceptionMessage = $_SESSION['exceptionMessage'];
            $_SESSION['exceptionMessage'] = "";
            return $exceptionMessage;
        }
        return "";        
    }
}