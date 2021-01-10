<?php namespace App\Src\bussines\session\application;

class SessionSubscriberLanguage
{
    static public function handle($language)
    {
        $_SESSION['language']=$language;
    }
}