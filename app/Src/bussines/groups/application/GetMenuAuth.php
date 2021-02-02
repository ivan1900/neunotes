<?php namespace App\Src\bussines\groups\application;

//use App\Src\bussines\groups\domain\TypeGroup;
use App\Src\bussines\groups\application\GroupTypeFinder;
use App\Src\bussines\groups\infrastructure\GroupsRepositoryMySql;
use App\Src\bussines\groups\infrastructure\IsUserInGroupSQL;
use App\Src\bussines\groups\domain\UserNotGroups;
use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\groups\application\RequestMenuAuth;

final class GetMenuAuth
{
    public function __invoke(RequestMenuAuth $request)
    {  
        $repository = new GroupsRepositoryMySql();
        $userInGroup = new IsUserInGroupSql($request->uuid());
        $groupFinder = new GroupTypeFinder($repository);
        try
        {
            return $groupFinder($request->uuid(), $userInGroup);
        }
        catch (UserNotGroups $e)
        {
            SessionExceptionMessage::setExceptionMessage($e);
            return null;
        }
    }
}