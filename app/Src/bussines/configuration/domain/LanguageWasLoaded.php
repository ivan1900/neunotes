<?php namespace App\Src\bussines\configuration\domain;

use App\Src\shared\domain\events\DomainEvent;
use App\Src\shared\domain\events\PublishableDomainEvent;

class LanguageWasLoaded implements DomainEvent, PublishableDomainEvent
{
    private $language;
    private $occurredOn;

    public function __construct($language)
    {
        $this->language = $language;
        $this->occurredOn = (new \DateTimeImmutable())->getTimestamp();
    }

    public function eventName()
    {
        return "LanguageWasLoaded";
    }

    public function occurredOn()
    {
        return $this->occurredOn;
    }

    public function language()
    {
        return $this->language;
    }
}