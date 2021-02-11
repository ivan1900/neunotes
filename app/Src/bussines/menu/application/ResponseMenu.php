<?php namespace App\Src\bussines\menu\application;

class ResponseMenu
{
    private $id;
    private $item;
    private $level;
    private $route;
    private $fa;
    private $parent;
    private $isfront;
    private $isbackend;

    public function __construct($values)
    {
        $this->id = $values->id;
        $this->item = $values->elemento;
        $this->level = $values->nivel;
        $this->route = $values->ruta;
        $this->fa = $values->fa;
        $this->parent = $values->padre;
        $this->isfront = $values->esfront;
        $this->isbackend = $values->esbackend;
    }

    public function id()
     {
        return $this->id;
     }

     public function item()
     {
         return $this->item;
     }

     public function level()
     {
         return $this->level;
     }

     public function route()
     {
         return $this->route;
     }

     public function fa()
     {
         return $this->fa;
     }

     public function parent()
     {
         return $this->parent;
     }

     public function isfront()
     {
         return $this->isfront;
     }

     public function isbackend()
     {
         return $this->esbacked;
     }
}