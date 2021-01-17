<?php namespace App\Src\bussines\users\application\login;

use App\Src\bussines\users\domain\login\UserLogin;
use App\Src\bussines\users\domain\login\LoginAssemblyRequest;
use App\Src\bussines\users\application\login\RequestLogin;
use App\Src\bussines\users\application\login\GetUserLogin;
use App\Src\bussines\users\infrastructure\login\UserLoginRepositoryCI;
use App\Src\bussines\users\domain\UserNotExists;
use App\Src\shared\infrastructure\EventDispatcher;

class UserLoginCheck
{
    private $userLogin;
    private $userInDB;
    private $dispatcher;
    
    public function __construct(RequestLogin $request){
        $assembly = new LoginAssemblyRequest($request);
        $this->userLogin = UserLogin::encodeSHA256FromValues($assembly->user(),$assembly->password());

        $userLoginRepository = new UserLoginRepositoryCI();
        $getUserLogin = new GetUserLogin($userLoginRepository);

        try
        {
            $this->userInDB = $getUserLogin($this->userLogin);
        }catch(UserNotExists $exception){
            throw new \Exception($exception->errorCode());
        }

        $this->dispatcher = new EventDispatcher();
    }

    public function execute()
    {
        $isLogged = $this->userLogin->equalsTo($this->userInDB);

        $events = $this->userLogin->pullDomainEvents();
        $this->dispatcher->notify($events);

        return $isLogged;
    }

}