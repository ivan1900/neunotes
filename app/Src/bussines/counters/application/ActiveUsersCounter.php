<?php namespace App\Src\bussines\counters\application;

use App\Src\bussines\counters\infrastructure\CountersRepository;
use App\Src\bussines\counters\infrastructure\IsCounterActiveUsers;

class ActiveUsersCounter 
{
    public function __invoke()
    {
        $repository = new CountersRepository();
        $isCounterActiveUsers = new IsCounterActiveUsers;
        return $repository->searchByCriteria($isCounterActiveUsers);
    }
}