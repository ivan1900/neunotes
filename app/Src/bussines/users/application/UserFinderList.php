<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\domain\IUserRepository;
//use App\Src\bussines\users\domain\User;

final class UserFinderList
{
    private $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($criteria): array
    {
        $userList = $this->repository->searchByCriteria($criteria);
        
        return $userList;
    }
}