<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\application\CreateUserCommand;
//use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\users\application\UserFinder;
use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\users\domain\UserNotExists;
use App\Src\bussines\users\infrastructure\IsUser;
class GetUser
{
    private $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(GetUserCommand $getUserCommand)
    {
        $user = $getUserCommand->user();
        $isUser = new IsUser($user);
        $finder = new UserFinder($this->repository);
        
        try{
            $response = $finder($isUser);
        }catch(UserNotExists $exception){
            throw new \Exception($exception->errorCode());
        }

        return $response;
    }

}

