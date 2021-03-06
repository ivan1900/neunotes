<?php namespace App\Src\bussines\counters\domain;

interface ICountersRepository
{
    public function searchByCriteria(ICounterSpecification $specification);

    public function update($value, $item);

}