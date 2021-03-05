<?php
declare(strict_types = 1);

namespace App\Src\shared\domain\criteria;

final class Field
{
    private $field;
    
    public function __construct($field)
    {
        $this->field    = $field;
    }

    public static function new($value): self
    {
        return new self($value);
    }

    public function item()
    {
        return $this->field;
    }
}