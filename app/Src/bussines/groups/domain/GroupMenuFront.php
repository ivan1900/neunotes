<?php 

declare(strict_types=1);

namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\valueObject\BoolValueObject;

final class GroupMenuFront extends BoolValueObject
{
    public static function fromValues(bool $value):self
    {
        return new self($value);
    }    
}