<?php namespace App\Src\bussines\counters\infrastructure;

use App\Src\bussines\counters\domain\ICounterSpecification;

class IsCounterActiveUsers implements ICounterSpecification{
    

    public function isCounter()
    {
        $sql = 'Select * from counters where item= "users"';
        return $sql;
    }
}