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
    private $userUuid;

    public function __invoke(RequestMenuAuth $request)
    {
        $this->userUuid = $request->uuid();
        
        $repository = new GroupsRepositoryMySql();
        $userInGroup = new IsUserInGroupSql();
        $groupFinder = new GroupTypeFinder($repository);
        try
        {
            return $groupFinder($this->userUuid, $userInGroup->selectSatisfying($this->userUuid));
        }
        catch (UserNotGroups $e)
        {
            SessionExceptionMessage::setExceptionMessage($e);
            return null;
        }
    }

}