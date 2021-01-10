<?php

namespace App\Src\bussines\users\domain;

use App\Src\shared\domain\aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private $id;
    private $user;
    private $password;
    

    public function __construct(?int $id, ?string $user, ?string $password, ?int $rolId)
    {
        $this->id = $id;
        $this->user = $user;
        $this->password = $password;
        $this->rolId = $rolId;
    }

    public static function fromValues(object $values):self
    {
        return new self($values->id, $values->usuario, $values->password, $values->rol);
    }

    public function id()
    {
        return $this->id;
    }

    public function userName()
    {
        return $this->user;
    }

    public function password()
    {
        return $this->password;
    }
}
