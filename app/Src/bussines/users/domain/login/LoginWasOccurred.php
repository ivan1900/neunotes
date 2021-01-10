<?php namespace App\Src\bussines\users\domain\login;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;

class LoginWasOccurred implements DomainEvent, PublishableDomainEvent
{
    private $userName;
    private $wasLogged;
    private $occurredOn;

    public function __construct($userName, $wasLogged)
    {
        $this->userName = $userName;
        $this->occurredOn = (new \DateTimeImmutable())->getTimestamp();
        $this->wasLogged = $wasLogged;
    }

    public function eventName()
    {
        return "LoginWasOccurred";
    }

    public function occurredOn()
    {
        return $this->occurredOn;
    }

    public function userName()
    {
        return $this->userName;
    }

    public function wasLogged()
    {
        return $this->wasLogged;
    }
}