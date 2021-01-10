<?php
declare(strict_types = 1);

namespace App\src\shared\domain\criteria;

final class Join
{
    private $typeJoin;
    private $tableToJoin;
    private $fieldTable1;
    private $fieldToJoin;
    private $operator;

    public function __construct($typeJoin, $tableToJoin, $fieldTable1, $operator, $fieldToJoin)
    {
        $this->typeJoin = $typeJoin;
        $this->tableToJoin = $tableToJoin;
        $this->fieldTable1 = $fieldTable1;
        $this->fieldToJoin = $fieldToJoin;
        $this->operator = $operator;   
    }

    public static function fromValues(array $values): self
    {
        return new self(
            ($values['typeJoin']),
            ($values['tableToJoin']),
            ($values['fieldTable1']),
            ($values['operator']),
            ($values['fieldToJoin'])
        );
    }

    public function typeJoin()
    {
        return $this->typeJoin;
    }

    public function tableToJoin()
    {
        return $this->tableToJoin;
    }

    public function fieldTable1()
    {
        return $this->fieldTable1;
    }
    
    public function fieldToJoin()
    {
        return $this->fieldToJoin;
    }

    public function operator()
    {
        return $this->operator;
    }
}