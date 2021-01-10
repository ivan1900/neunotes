<?php namespace App\Src\bussines\login\application;

use App\Src\bussines\login\domain\IUserLoginCheck;
use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\shared\domain\ShaEncode;
use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\domain\UserNotExists;
use App\Src\bussines\session\application\SessionExceptionMessage;

class UserLoginCheck implements IUserLoginCheck
{
    private $user;
    private $userFound;

    function __construct(User $user, User $userFound){
        $this->user = $user;
        $this->userFound = $userFound;
    }

    public function getEncodedPass(){
        return hash('sha256', $this->user->password());
    }

    public function isLogin(){

        if ($this->userFound->password() == $this->getEncodedPass())
        {
            return true;
        }
        
        return false;
    }

}