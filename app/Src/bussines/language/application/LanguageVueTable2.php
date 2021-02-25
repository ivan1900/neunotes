<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\application\CallLanguage;

class LanguageVueTable2
{
    public static function get($language):array
    {
        $callLang = new CallLanguage();
        $language = $language . "VueTable2";
        return $callLang->$language();
    }
}