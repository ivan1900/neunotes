<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\domain\Spanish;
use App\Src\bussines\language\domain\SpanishErrorCodes;
use App\Src\bussines\language\domain\SpanishForms;
use App\Src\bussines\language\domain\English;

class CallLanguage
{
    public function spanish():array
    {
        $langMap = new spanish();
        return $langMap->getMap();
    }

    public function spanishErrorCodes():array
    {
        $langMap = new spanishErrorCodes();
        return $langMap->getMap();
    }

    public function spanishForms():array
    {
        $langMap = new spanishForms();
        return $langMap->getMap();
    }

    public function english():array
    {
        $langMap = new english();
        return $langMap->getMap();
    }
}