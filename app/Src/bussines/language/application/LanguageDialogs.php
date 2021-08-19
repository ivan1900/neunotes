<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\application\CallLanguage;

class LanguageDialogs
{
    public static function get($language):array
    {
        $callLang = new CallLanguage();
        $language = $language . "Dialogs";
        return $callLang->$language();
    }
}