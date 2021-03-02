<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\infrastructure\GroupsRepositoryMySql;
use App\Src\bussines\groups\infrastructure\IsUserInGroupSql;
use App\Src\bussines\groups\domain\UserNotGroups;
use App\Src\bussines\groups\domain\AssemblyGroup;
use App\Src\bussines\groups\domain\Group;
use App\Src\bussines\groups\domain\IsMenuAdminSpecification;
use App\Src\bussines\groups\application\GroupTypeFinder;
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
            $response = $groupFinder($request->uuid(), $userInGroup);
        }
        catch (UserNotGroups $e)
        {
            SessionExceptionMessage::setHackExceptionMessage($e);
            return null;
        }

        $isMenuAdminSpecification = new IsMenuAdminSpecification();
        foreach($response as $value){
            $assemblyGroup = new assemblyGroup($value);
            $group = new Group($assemblyGroup->groupUuid(),$assemblyGroup->groupName(),$assemblyGroup->menuBackend(),$assemblyGroup->menuFront());
            $satisfied = $isMenuAdminSpecification->isSatisfiedBy($group); 
            if ($satisfied){
                return true;}
        }
        return false;
    }
}