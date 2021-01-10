<?php

namespace App\Src\bussines\usescase\domain;

use App\Src\shared\DomainError;

final class UseCaseNotExists extends DomainError
{
    private $value;

    public function __construct(?string $value)
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
        return sprintf('The use case <%s> does not exists', $this->value);
    }
}