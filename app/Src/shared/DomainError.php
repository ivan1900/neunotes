<?php

namespace App\Src\shared;

use DomainException;

abstract class DomainError extends DomainException
{
    public function __construct(){
        parent::__construct($this->errorMessage(), $this->errorCode());
    }
    
    abstract public function errorCode(): string;

    abstract public function errorMessage(): string;
}
