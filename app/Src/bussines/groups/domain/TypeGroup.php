<?php namespace App\Src\bussines\groups\domain;

final class TypeGroup
{
    private $id;
    private $name;
    private $menufront;
    private $menubackend;
    private $casesid;

    public function __construct(int $id, string $name, bool $menufront, bool $menubackend, int $casosid){
        $this->id = $id;
        $this->name = $name;
        $this->menufront = $menufront;
        $this->menubackend = $menubackend;
        $this->casesid = $casosid;
    }

    public static function fromValues(object $values):self
    {
        return new self($values->id, $values->name, $values->menufront, $values->menubackend, $values->casosid);
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function menufront()
    {
        return $this->menufront;
    }

    public function menubackend()
    {
        return $this->menubackend;
    }

    public function casesid()
    {
        return $this->casesid;
    }
}