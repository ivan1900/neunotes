<?php namespace App\Src\bussines\language\application;

use App\Src\bussines\language\domain\Spanish;
use App\Src\bussines\language\domain\SpanishErrorCodes;
use App\Src\bussines\language\domain\SpanishVueTable2;
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

    public function spanishVueTable2():array
    {
        $langMap = new spanishVueTable2();
        return $langMap->getMap();
    }

    public function english():array
    {
        $langMap = new english();
        return $langMap->getMap();
    }
}