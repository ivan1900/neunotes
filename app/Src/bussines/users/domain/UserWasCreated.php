<?php namespace App\Src\bussines\users\domain;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;
use DateTimeZone;

class UserWasCreated implements DomainEvent, PublishableDomainEvent
{
    private $userName;
    private $occurredOn;
    private $userUuid;

    public function __construct($userName, $userUuid)
    {
        $this->userName = $userName;
        $this->occurredOn = new \DateTimeImmutable("now", new DateTimeZone('UTC'));
        $this->userUuid = $userUuid;
    }

    public function eventName()
    {
        return "UserWasCreated";
    }

    public function occurredOn()
    {
        return $this->occurredOn;
    }

    public function userName()
    {
        return $this->userName;
    }

    public function userUuid()
    {
        return $this->userUuid;
    }
}