<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\domain\UserNotExists;
use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\users\domain\IUserSpecification;
class UserFinder
{
    private $repository;

    public function __construct(IUserRepository $UserRepository)
    {
        $this->repository = $UserRepository;
    }

    public function __invoke(IUserSpecification $user)
    {
        $response = $this->repository->searchByUserName($user);
        
        if (null === $response){
            throw new UserNotExists("");
        }

        return $response;
    }

}