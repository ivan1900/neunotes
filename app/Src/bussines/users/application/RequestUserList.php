<?php namespace App\Src\bussines\users\application;

final class RequestUserList
{
    public function __construct(
        private $isActive,
        private $from,
        private $to
    ){}

    public function isActive()
    {
        return $this->isActive;
    }

    public function from()
    {
        return $this->from;
    }

    public function to()
    {
        return $this->to;
    }
}