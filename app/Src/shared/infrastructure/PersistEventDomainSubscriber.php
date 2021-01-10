<?php namespace App\Src\shared\infrastructure;

//use App\Src\shared\domain\events\DomainEventSubscriber;
use App\Models\DomainEventsModel;

class PersistEventDomainSubscriber 
{
    public static function handle($eventName, $userName, $wasLogged, $ocurredOn)
    {
        $db = new DomainEventsModel();
        $dataToSerialize = [
            'eventName' => $eventName,
            'userName' => $userName,
            'wasLogged' => $wasLogged
        ];
        $serialized = json_encode($dataToSerialize);
        $data = [
            'userName' => $userName,
            'serialized' => $serialized,
            'occurredOn' => $ocurredOn
        ];
        $db->protect(false)->save($data);
    }

}