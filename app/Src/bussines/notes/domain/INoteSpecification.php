<?php namespace App\Src\bussines\notes\domain;

interface INoteSpecification
{
    //public function isSatisfiedBy(Object $candidate): bool;

    public function isSatisfied(): string;

}