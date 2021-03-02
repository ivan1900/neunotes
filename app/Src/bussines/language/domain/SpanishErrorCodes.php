<?php namespace App\Src\bussines\language\domain;

class SpanishErrorCodes 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            '1000' => 'Usuario o contraseña invalidos', 
            '1001' => 'El usuario no existe',
            '1003' => 'El grupo o grupos no existen'
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}

