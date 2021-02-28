<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\application\GroupTypeFinder;
use App\Src\bussines\groups\infrastructure\GroupsRepositoryMySql;
use App\Src\bussines\groups\domain\UserNotGroups;
use App\Src\bussines\session\application\SessionExceptionMessage;

use App\Src\bussines\groups\application\RequestGroupsList;

final class GetGroupsList
{
    private $isActive;
    
    public function __construct(RequestGroupsList $request)
    {
        $this->isActive = $request->isActive();
    }

    public function __invoke()
    {
        $isUsersActive = new IsGroupsActive($this->isActive);
        $repository = new UserRepositoryMySql();
        $userFinder = new UserFinderList($repository);
        return $userFinder($isUsersActive);

        $criteria = new Criteria('grupos',$this->fields(), null,null,null,null,null);
        $repository = new GroupsRepositoryMySql();
        $groupFinder = new GroupTypeFinder($repository);
        try
        {
            return $groupFinder(null, $criteria);
        }
        catch (UserNotGroups $e)
        {
            SessionExceptionMessage::setExceptionMessage($e);
            return null;
        }
    }

}