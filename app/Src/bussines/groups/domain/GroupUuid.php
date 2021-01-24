<?php namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\valueObject\Uuid;

final class GroupUuid extends Uuid
{
    static function fromValues($value):self
    {
        return new self($value);
    }
}