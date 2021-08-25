<?php namespace App\Src\bussines\language\domain;

class SpanishErrorCodes 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            '1000' => 'Usuario o contraseña invalidos', 
            '1001' => 'El usuario no existe',
            '1003' => 'El grupo o grupos no existen',
            '1004' => 'Fallo al ejecutar la acción' ,
            //mysql
            '1062' => 'Entrada duplicada',
            ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}

