<?php 

declare(strict_types=1);

namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\valueObject\IntValueObject;

final class GroupMenuFront extends IntValueObject
{
    public static function fromValues(bool $value):self
    {
        return new self($value);
    }    
}