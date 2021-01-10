<?php

namespace App\Src\bussines\groups\domain;

use App\Src\shared\DomainError;

final class UserNotGroups extends DomainError
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 1002;
        
    }

    public function errorMessage(): string
    {
        return sprintf('The user <%s> does not exists in any groups', $this->value);
    }
}