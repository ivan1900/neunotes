<?php 

declare(strict_types=1);

namespace App\Src\bussines\users\domain;

use App\Src\shared\domain\valueObject\BoolValueObject;

final class UserActive extends BoolValueObject
{
    public static function fromValues(bool $UserActive):self
    {
        return new self($UserActive);
    }    

}