<?php namespace App\Src\shared\domain\valueObject;

class StringValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string 
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }
}
