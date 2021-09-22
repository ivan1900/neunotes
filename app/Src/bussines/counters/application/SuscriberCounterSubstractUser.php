<?php namespace App\Src\bussines\counters\application;

use App\Src\bussines\counters\application\ActiveUsersCounter;
use App\Src\bussines\counters\infrastructure\CountersRepository;
class SuscriberCounterSubstractUser
{
    static function handle()
    {
        $getActiveUsersCount = new ActiveUsersCounter();
        $activeUsersCount = $getActiveUsersCount();

        $count = $activeUsersCount->value - 1;

        $repository = new CountersRepository();

        $repository->update($activeUsersCount->item,$count);
    }
}