<?php namespace App\Src\bussines\users\domain\login;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;
use DateTimeZone;
class LoginWasOccurred implements DomainEvent, PublishableDomainEvent
{
    private $userName;
    private $wasLogged;
    private $occurredOn;
    private $userUuid;

    public function __construct($userName, $wasLogged, $userUuid)
    {
        $this->userName = $userName;
        $date = new \DateTime("now", new DateTimeZone('UTC'));
        $this->occurredOn = $date->format('Y-m-d H:i:s');
        $this->wasLogged = $wasLogged;
        $this->userUuid = $userUuid;
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

    public function userUuid()
    {
        return $this->userUuid;
    }
}