<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\application\RequestUser;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;
use App\Src\bussines\users\application\UserFinder;
use App\Src\bussines\users\domain\UserNotExists;
use App\Src\bussines\users\infrastructure\IsUser;
class GetUser
{
    private $user;

    public function __construct(RequestUser $request)
    {
        $this->user = $request->user();
    }

    public function execute()
    {
        $isUser = new IsUser($this->user);
        $repository = new UserRepositoryMySql();
        $finder = new UserFinder($repository);
        
        try{
            $response = $finder($isUser);
        }catch(UserNotExists $exception){
            throw new \Exception($exception->errorCode());
        }

        return $response;
    }

}