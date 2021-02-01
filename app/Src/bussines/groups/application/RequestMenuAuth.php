<?php namespace App\Src\bussines\groups\application;

final class RequestMenuAuth
{
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function uuid()
    {
        return $this->uuid;
    }
}