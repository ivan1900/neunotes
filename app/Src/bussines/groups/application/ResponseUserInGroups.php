<?php namespace App\Src\bussines\groups\application;

final class ResponseUserInGroups 
{
    private $menuFront;
    private $menuBackend;
    private $name;
    private $groupUuid;

    public function __construct($values)
    {
        $this->menuFront = $values->menufront;
        $this->menuBackend = $values->menubackend;
        $this->name = $values->name;
        $this->groupUuid = $values->groupUuid;
    }

    public function menuFront()
    {
        return $this->menuFront;
    }

    public function menuBackend()
    {
        return $this->menuBackend;
    }

    public function name()
    {
        return $this->name;
    }

    public function groupUuid()
    {
        return $this->groupUuid;
    }
}