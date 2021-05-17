<?php namespace App\Src\bussines\groups\application;

final class RequestGroupsList
{
    public function __construct(
        private $isActive = true
    ){}

    public function isActive()
    {
        return $this->isActive;
    }
}