<?php namespace App\Src\bussines\groups\domain;

interface IGroupsSpecification
{
    //public function isSatisfiedBy(Object $candidate): bool;

    public function selectSatisfying(): string;

}