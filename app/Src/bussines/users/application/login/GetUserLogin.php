<?php namespace App\Src\bussines\users\application\login;

use App\Src\bussines\users\domain\UserNotExists;
use App\Src\bussines\users\domain\login\UserLogin;
use App\Src\bussines\users\domain\login\IUserLoginRepository;
use App\Src\bussines\users\domain\login\LoginAssembly;
// use App\Src\bussines\session\application\SessionExceptionMessage;

class GetUserLogin
{
    private $repository;

    public function __construct(IUserLoginRepository $UserLoginRepository)
    {
        $this->repository = $UserLoginRepository;
    }

    public function __invoke(UserLogin $userLogin): UserLogin
    {
        $response = $this->repository->searchByUserName($userLogin->userName()->value());
        
        if (null === $response){
            throw new UserNotExists($userLogin->userName()->value());
        }

        $assembly = new LoginAssembly($response);
        $userLogin = UserLogin::fromValues($assembly->user(),$assembly->password());
        return $userLogin;
    }

}