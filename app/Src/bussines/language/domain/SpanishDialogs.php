<?php namespace App\Src\bussines\language\domain;

class SpanishDialogs
{
    public $langMap = [];

    public function __construct()
    {
        $delete = [
            'title' => 'Eliminar registro',
            'text' => '¿Seguro que quieres eliminar el registro?',

            'accept' => 'Aceptar',
            'cancel' => 'Cancelar'
        ];

        $this->langMap['delete'] = $delete;
    }

    public function getMap()
    {
        return $this->langMap;
    }
}