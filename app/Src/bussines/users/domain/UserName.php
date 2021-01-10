<?php 

declare(strict_types=1);

namespace App\Src\bussines\users\domain;

use App\Src\shared\domain\valueObject\StringValueObject;

final class UserName extends StringValueObject
{
    public static function fromValues(string $UserName):self
    {
        return new self($UserName);
    }    

    public function equals(UserName $anUserName)
    {
        return $anUserName->value() === $this->value();
    }
}