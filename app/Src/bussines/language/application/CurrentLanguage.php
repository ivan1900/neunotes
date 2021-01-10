<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\application\CallLanguage;

class CurrentLanguage
{
    public static function get($language):array
    {
        $callLang = new CallLanguage();
        return $callLang->$language();
    }
}