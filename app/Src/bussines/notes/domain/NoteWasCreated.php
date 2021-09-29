<?php namespace App\Src\bussines\notes\domain;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;
use DateTimeZone;

class NoteWasCreated implements DomainEvent, PublishableDomainEvent
{
    private $noteTitle;
    private $occurredOn;
    private $noteUuid;

    public function __construct($noteTitle, $noteUuid)
    {
        $this->noteTitle = $noteTitle;
        $this->occurredOn = new \DateTimeImmutable("now", new DateTimeZone('UTC'));
        $this->noteUuid = $noteUuid;
    }

    public function eventName()
    {
        return "NoteWasCreated";
    }

    public function occurredOn()
    {
        return $this->occurredOn;
    }

    public function noteTitle()
    {
        return $this->noteTitle;
    }

    public function noteUuid()
    {
        return $this->noteUuid;
    }
}