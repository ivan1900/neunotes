<?php

declare(strict_types=1);

namespace App\Src\shared\domain\valueObject;

class BoolValueObject
{
    protected $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }
}