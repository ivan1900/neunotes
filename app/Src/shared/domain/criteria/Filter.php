<?php
declare(strict_types = 1);

namespace App\Src\shared\domain\criteria;

final class Filter
{
    private $logicOperator;
    private $field;
    private $operator;
    private $value;

    public function __construct($logicOperator, $field, $operator, $value)
    {
        $this->logicOperator = $logicOperator;
        $this->field    = $field;
        $this->operator = $operator;
        $this->value    = $value;
    }

    public static function fromValues(array $values): self
    {
        return new self(
            new FilterField($values['field']),
            new FilterOperator($values['operator']),
            new FilterValue($values['value'])
        );
    }

    public function logicOperator()
    {
        return $this->logicOperator;
    }

    public function field()
    {
        return $this->field;
    }

    public function operator()
    {
        return $this->operator;
    }
    
    public function value()
    {
        return $this->value;
    }
}