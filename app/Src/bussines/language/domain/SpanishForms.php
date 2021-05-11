<?php namespace App\Src\bussines\language\domain;

class SpanishForms 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            'name' => "Nombre",
            'userName' => "Nombre de usuario",
            'mail' => "Correo electrónico",
            'position' => "Cargo",
            'address' => "Dirección",
            'phone' => "Teléfono:",
            'language' => "Idioma",
            'active' => "Activo",
            'password' => "Contraseña",
            'send' => "Enviar",
            'clean' => "Limpiar",
            'newUser' => "Nuevo usuario"
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}