<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\application\RequestCreateUser;
use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\domain\UserActive;
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
use App\Src\shared\infrastructure\EventDispatcher;
class CreateUser
{
    private $dispatcher;

    public function __construct()
    {   
        $this->dispatcher = new EventDispatcher;
    }

    public function create(RequestCreateUser $request)
    {
        $uuidCreator = new UserUuid(null);
        $uuid = $uuidCreator->random();
        $name = new UserName($request->name);
        $user = new UserNickName($request->user);
        $password = new UserPassword($request->password);
        $phone = new UserPhone($request->phone);
        $email = new UserEmail($request->email);
        $address = new UserAddress($request->address);
        $position = new UserPosition($request->position);
        $role = new UserRole($request->role);
        $language = new UserLanguage($request->language);
        $active = new UserActive($request->active);

        // falta añadir active aquí y en el dominio

        $newUser = User::create($uuid,$name,$user,$password,$phone,$email,$address,$position,$role,$language,$active);
        $repository = new UserRepositoryMySql();
        
        $repository->save($newUser);

        $events = $newUser->pullDomainEvents();
        $this->dispatcher->notify($events);
    }

}