<?php namespace App\Src\bussines\menu\application;

class ResponseMenu
{
    public $id;
    public $item;
    public $level;
    public $route;
    public $fa;
    public $parent;
    public $isfront;
    public $isbackend;

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