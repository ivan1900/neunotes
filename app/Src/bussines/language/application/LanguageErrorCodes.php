<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\application\CallLanguage;

class LanguageErrorCodes
{
    public static function get($language):array
    {
        $callLang = new CallLanguage();
        $language = $language . "ErrorCodes";
        return $callLang->$language();
    }
}