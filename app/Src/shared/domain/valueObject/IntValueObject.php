<?php

declare(strict_types=1);

namespace App\Src\shared\domain\valueObject;

class IntValueObject
{
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int 
    {
        return $this->value;
    }
}