<?php namespace App\Src\bussines\users\application;

final class RequestUserList
{
    public function __construct(
        private $isActive
    ){}

    public function isActive()
    {
        return $this->isActive;
    }
}