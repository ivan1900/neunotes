<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\application\RequestCreateUser;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;
use App\Src\bussines\users\domain\UserUuid;
use App\Src\bussines\users\domain\UserName;
use App\Src\bussines\users\domain\UserNickName;
use App\Src\bussines\users\domain\UserPassword;
use App\Src\bussines\users\domain\UserPhone;
use App\Src\bussines\users\domain\UserAddress;
use App\Src\bussines\users\domain\UserEmail;
use App\Src\bussines\users\domain\UserPosition;
use App\Src\bussines\users\domain\UserRole;
use App\Src\bussines\users\domain\UserLanguage;

class CreateUser
{
    public function __construct()
    {}

    public function create(RequestCreateUser $request)
    {
        
    }
}