<?php namespace App\Src\bussines\users\domain;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;
use DateTimeZone;

class UserWasDeleted implements DomainEvent, PublishableDomainEvent
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
        $date = new \DateTime("now", new DateTimeZone('UTC'));
        $this->occurredOn = $date->format('Y-m-d H:i:s');
    }

    public function eventName()
    {
        return "UserWasDeleted";
    }

    public function occurredOn()
    {
        return $this->occurredOn;
    }

    public function id()
    {
        return $this->id;
    }

}