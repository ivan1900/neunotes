<?php namespace App\Src\bussines\users\domain\login;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;

class UserCreated implements DomainEvent, PublishableDomainEvent
{
    private $userName;
    private $occurredOn;
    private $userUuid;

    public function __construct($userName, $userUuid)
    {
        $this->userName = $userName;
        $this->occurredOn = (new \DateTimeImmutable())->getTimestamp();
        $this->userUuid = $userUuid;
    }

    public function eventName()
    {
        return "UserCreated";
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