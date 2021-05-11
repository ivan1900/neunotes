<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\application\CallLanguage;

class LanguageForms
{
    public static function get($language):array
    {
        $callLang = new CallLanguage();
        $language = $language . "Forms";
        return $callLang->$language();
    }
}