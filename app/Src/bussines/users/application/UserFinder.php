<?php

namespace App\Src\bussines\users\application;

use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\users\domain\UserLogin;

final class UserFinder
{
    private $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($user): UserLogin
    {
        $user = $this->repository->searchByUserName($user);
        
        if (null === $user){
            throw new UserNotExists($name);
        }

        return $user;
    }
}