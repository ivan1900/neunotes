<?php namespace App\Src\bussines\groups\application;

final class ResponseUserInGroups 
{

    public function __construct(
        private $values
        )
    {}

    public function asArray()
    {
        return $this->values;
    }

    public function menuFront()
    {
        return $this->values->menufront;
    }

    public function menuBackend()
    {
        return $this->values->menubackend;
    }

    public function name()
    {
        return $this->values->name;
    }

    public function uuid()
    {
        return $this->values->uuid;
    }

    public function active()
    {
        return $this->values->active;
    }

    public function created_at()
    {
        return $this->values->created_at;
    }

    public function updated_at()
    {
        return $this->values->updated_at;
    }

    public function deleted_at()
    {
        return $this->values->deleted_at;
    }
}