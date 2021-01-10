<?php declare(strict_types=1);

namespace App\Src\bussines\users\domain;

use App\Src\bussines\users\domain\Sha256Encode;
use App\Src\shared\domain\valueObject\StringValueObject;

final class UserPassword extends StringValueObject
{
    static function encodeSHA256(string $value):self
    {
        return new self(Sha256Encode::execute($value));
    }

    static function fromValues(string $password):self
    {
        return new self($password);
    }

    public function equals(UserPassword $anUserPassword)
    {
        return $anUserPassword->value() === $this->value();
    }
}