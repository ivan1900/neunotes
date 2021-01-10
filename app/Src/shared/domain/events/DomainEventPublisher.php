<?php namespace App\Src\shared\domain\events;
/*
Los eventos de dominio (ej. NewUserHasBeenCreated) se crearían en la capa de dominio en la que se encuentran las entidades
y una solución podría ser encolarlos en un event bus para que se vayan despachando.

Tipicamente el event bus iría en la carpeta Shared/domain y las clases que se encargarían de la gestión de los eventos 
dependiendo del tipo de acción a ejecutar (ej. publicación en una cola de mensajes o algún evento que está relacionado 
con acciones a nivel de base de datos) se implementarían en la carpeta Shared/infrastructure.
*/
class DomainEventPublisher
{
    private $subscribers;
    private static $instance = null;
    private $id = 0;

    public static function instance()
    {
        if(null === static::$instance){
            static::$instance = new self();
        }
        
        return static::$instance;
    }

    private function __construct()
    {
        $this->subscribers = [];
    }

    public function suscribe($aDomainEventSuscriber)
    {
        $id = $this->id;
        $this->subscribers[$id] = $aDomainEventSuscriber;
        $this->id++;
    }

    public function ofId($id)
    {
        return isset($this->subscribers[$id]) ? $this->subscribers[$id] : null;
    }

    public function unsubscribe($id)
    {
        unset($this->subscribers[$id]);
    }

    public function publish(DomainEvent $aDomainEvent)
    {
        foreach ($this->subscribers as $aSubscriber) {
            if ($aSubscriber->isSubscribedTo($aDomainEvent)){
                $aSubscriber->handle($aDomainEvent);
            }
        }
    }
}