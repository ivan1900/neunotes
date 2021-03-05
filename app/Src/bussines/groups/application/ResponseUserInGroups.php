<?php namespace App\Src\bussines\groups\application;

final class ResponseUserInGroups 
{
    public static function new(...$args)
    {        
        return new self(...$args);
    }

    public function __construct(
        public $id,
        public $menufront,
        public $menubackend,
        public $name,
        public $uuid,
        public $active,
        public $created_at,
        public $updated_at,
        public $deleted_at
        )
    {}

    public function menuFront()
    {
        return $this->menufront;
    }

    public function menuBackend()
    {
        return $this->menubackend;
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