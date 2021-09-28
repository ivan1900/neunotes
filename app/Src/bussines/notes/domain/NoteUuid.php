<?php namespace App\Src\buissines\notes\domain;

use App\Src\shared\domain\valueObject\Uuid;

final class NoteUuid extends Uuid
{
    static function fromValues($value):self
    {
        return new self($value);
    }
}
