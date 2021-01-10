<?php namespace App\Src\bussines\customers\domain;

final class Customer
{
    private $id;
    private $name;
    private $user;
    private $password;
    private $DNI;

    public function __construct(int $id, string $name, string $user, string $password, string $DNI){
        $this->id = $id;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
        $this->DNI = $DNI;
    }

    public static function fromValues(object $values):self
    {
        return new self($values->id, $values->name, $values->user, $values->password, $values->DNI);
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function user()
    {
        return $this->user;
    }

    public function password()
    {
        return $this->password;
    }

    public function DNI()
    {
        return $this->DNI;
    }
}