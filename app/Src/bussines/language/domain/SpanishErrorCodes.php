<?php namespace App\Src\bussines\language\domain;

class SpanishErrorCodes 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            '1000' => 'Usuario o contraseña invalidos', 
            '1001' => 'El usuario no existe'
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}

