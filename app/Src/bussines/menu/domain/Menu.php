<?php namespace App\Src\bussines\menu\domain;

final class Menu 
{
    private $id;
    private $item;
    private $level;
    private $route;
    private $fa;
    private $parent;
    private $isfront;
    private $isbackend;

    public function __construct(int $id, string $item, int $level, string $route, string $fa, int $parent, bool $isfront, bool $isbackend)
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

     public static function fromValues(object $values):Self
     {
        return new self($values->id, $values->item, $values->level, $values->route, $values->fa, $values->parent, $values->isfront, $values->isbackend);
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