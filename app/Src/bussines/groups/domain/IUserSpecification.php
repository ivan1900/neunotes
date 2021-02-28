<?php namespace App\Src\bussines\users\domain;

interface IUserSpecification
{
    //public function isSatisfiedBy(Object $candidate): bool;

    public function isSatisfied(): string;

}