<?php

namespace App\Src\bussines\users\domain;

use App\Src\shared\DomainError;

final class UserNotExists extends DomainError
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 1001;
    }

    public function errorMessage(): string
    {
        return sprintf('The user <%s> does not exists', $this->value);
    }
}