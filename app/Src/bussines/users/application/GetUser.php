<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\domain\UserNotExists;
use App\Src\bussines\users\application\UserFinder;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;
use App\Src\bussines\session\application\SessionExceptionMessage;

class GetUser
{
    public function __invoke(User $user): User
    {
        $repository = new UserRepositoryMySql();
        $userFinder = new UserFinder($repository);
        try
        {
            return $userFinder($user->userName());
        } catch (UserNotExists $e) {
            SessionExceptionMessage::setExceptionMessage($e);
            return  new User(0,"","");
        }
    }

}