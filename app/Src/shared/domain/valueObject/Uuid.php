<?php namespace App\Src\shared\domain\valueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function random():self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }
    
    public function value():string
    {
        return $this->value;
    }

    public function equals(Uuid $anUuid): bool
    {
        return $this->value() === $anUuid->value();
    }

    //aqui __tostring cuanto actualice a php 8

    public function ensureIsValidUuid(string $id)
    {
        if(!RamseyUuid::isValid($id)){
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }
}