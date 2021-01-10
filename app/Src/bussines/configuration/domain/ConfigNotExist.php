<?php namespace App\Src\bussines\configuration\domain;

use App\Src\shared\DomainError;

final class ConfigNotExist extends DomainError
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 1009;
    }

    public function errorMessage(): string
    {
        return sprintf('The configuration < %s > does not exists', $this->value);
    }
}