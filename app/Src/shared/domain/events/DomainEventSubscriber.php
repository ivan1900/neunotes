<?php namespace App\Src\shared\domain\events;

interface DomainEventSubscriber
{
    public function handle($aDomainEvent);
    public function isSuscribedTo($aDomainEvent);
}