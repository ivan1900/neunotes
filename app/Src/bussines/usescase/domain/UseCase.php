<?php namespace App\Src\bussines\usescase\domain;

class useCase
{
    private $id;
    private $name;
    private $table;
    private $active;

    public function __construct(int $id, string $name, string $table, int $active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->table = $table;
        $this->active = $active;
    }

    public static function fromValues(object $values):self
    {
        return new self($values->id, $values->nombre, $values->tabla, $values->activo);
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function activo()
    {
        return $this->activo;
    }

}