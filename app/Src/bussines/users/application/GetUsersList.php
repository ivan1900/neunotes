<?php namespace App\Src\bussines\users\application;

//use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\application\UserFinderList;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;
use App\Src\bussines\users\application\RequestUserList;
use App\Src\bussines\users\infrastructure\CriteriaUsersList;

class GetUsersList
{
    private $isActive;

    public function __construct(RequestUserList $request)
    {
        $this->isActive = $request->isActive();
    }

    public function __invoke()
    {
        $isActive = new CriteriaUsersList($this->isActive);
        $repository = new UserRepositoryMySql();
        $userFinder = new UserFinderList($repository);
        return $userFinder($isActive);
    }

}