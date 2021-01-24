<?php 

declare(strict_types=1);

namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\valueObject\StringValueObject;

final class GroupName extends StringValueObject
{
    public static function fromValues(string $GroupName):self
    {
        return new self($GroupName);
    }    
/*
    public function equals(UserName $anGroupName)
    {
        return $anGroupName->value() === $this->value();
    } */
}