<?php namespace App\Src\bussines\groups\application;

final class ResponseUserInGroups 
{
    private $menuAdmin;
    private $menuBackend;
    private $name;
    private $groupUuid;

    public function __construct($values)
    {
        $this->menuAdmin = $values->menuAdmin;
        $this->menuBackend = $values->menuBackend;
        $this->name = $values->name;
        $this->groupUuid = $values->groupUuid;
    }

    public function menuAdmin()
    {
        return $this->menuAdmin;
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