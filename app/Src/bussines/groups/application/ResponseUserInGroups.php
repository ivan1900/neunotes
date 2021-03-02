<?php namespace App\Src\bussines\groups\application;

final class ResponseUserInGroups 
{
    private $menuFront;
    private $menuBackend;
    private $name;
    private $uuid;
    private $active;
    private $created_at;
    private $updated_at;
    private $deleted_at;

    public function __construct($values)
    {
        $this->menuFront = $values->menufront;
        $this->menuBackend = $values->menubackend;
        $this->name = $values->name;
        $this->uuid = $values->uuid;
        $this->active = $values->active;
        $this->created_at = $values->created_at;
        $this->updated_at = $values->updated_at;
        $this->deleted_at = $values->deleted_at;
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

    public function uuid()
    {
        return $this->uuid;
    }

    public function active()
    {
        return $this->active;
    }

    public function created_at()
    {
        return $this->created_at;
    }

    public function updated_at()
    {
        return $this->updated_at;
    }

    public function deleted_at()
    {
        return $this->deleted_at;
    }
}