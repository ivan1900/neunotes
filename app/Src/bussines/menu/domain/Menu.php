<?php namespace App\Src\bussines\menu\domain;

final class Menu 
{
    private $id;
    private $elemento;
    private $nivel;
    private $ruta;
    private $fa;
    private $padre;
    private $esfront;
    private $esbackend;

    public function __construct(int $id, string $elemento, int $nivel, string $ruta, string $fa, int $padre, bool $esfront, bool $esbackend)
     {
        $this->id = $id;
        $this->elemento = $elemento;
        $this->nivel = $nivel;
        $this->ruta = $ruta;
        $this->fa = $fa;
        $this->padre = $padre;
        $this->esfront = $esfront;
        $this->esbackend = $esbackend;
     }

     public static function fromValues(object $values):Self
     {
        return new self($values->id, $values->elemento, $values->nivel, $values->ruta, $values->fa, $values->padre, $values->esfront, $values->esbackend);
     }

     public function id()
     {
        return $this->id;
     }

     public function elemento()
     {
         return $this->elemento;
     }

     public function nivel()
     {
         return $this->nivel;
     }

     public function ruta()
     {
         return $this->ruta;
     }

     public function fa()
     {
         return $this->fa;
     }

     public function padre()
     {
         return $this->padre;
     }

     public function esfront()
     {
         return $this->esfront;
     }

     public function esbackend()
     {
         return $this->esbacked;
     }
}