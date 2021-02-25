<?php namespace App\Src\bussines\language\domain;

class SpanishVueTable2 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            'count' => "Mostrar {from} de {to} a {count} registros|{count} registros|Un Registro",
            'first' => "Primero",
            'last' => "Ultimo",
            'filter' => "Filtro:",
            'filterPlaceholder' => "Buscar",
            'limit' => "Registros:",
            'page' => "Pagina:",
            'noResults' => "Nada que mostrar",
            'noRequest' => "Selecciona un filtro para obtener resultados",
            'filterBy' => "Filtrar por {column}",
            'loading' => "Cargando...",
            'defaultOption' => "Selecciona {column}",
            'columns:' => "Columnas"
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}