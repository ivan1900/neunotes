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

    public function __construct($id, $item, $level, $route, $fa, $parent, $isfront, $isbackend)
    {
        $this->id = $id;
        $this->item = $item;
        $this->level = $level;
        $this->route = $route;
        $this->fa = $fa;
        $this->parent = $parent;
        $this->isfront = $isfront;
        $this->isbackend = $isbackend;
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