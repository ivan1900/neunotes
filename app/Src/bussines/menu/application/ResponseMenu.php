<?php namespace App\Src\bussines\menu\application;

class ResponseMenu
{
    private $id;
    private $elemento;
    private $nivel;
    private $ruta;
    private $fa;
    private $padre;
    private $esfront;
    private $esbackend;

    public function __construct($id, $elemento, $nivel, $ruta, $fa, $padre, $esfront, $esbackend)
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