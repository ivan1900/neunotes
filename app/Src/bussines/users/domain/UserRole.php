<?php namespace App\Src\bussines\users\domain;

use App\Src\shared\domain\valueObject\Uuid;

final class UserRole extends Uuid
{
    static function fromValues($value):self
    {
        return new self($value);
    }
}