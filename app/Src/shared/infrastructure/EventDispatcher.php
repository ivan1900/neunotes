<?php namespace App\Src\shared\infrastructure;

class EventDispatcher
{
    public function notify($events)
    {
        foreach ($events as $event){
            \CodeIgniter\Events\Events::trigger($event->eventName(),$event);
        }
    }

}