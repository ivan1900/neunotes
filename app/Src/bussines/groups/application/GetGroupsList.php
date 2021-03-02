<?php namespace App\Src\bussines\groups\application;

//use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\groups\application\GroupsFinderList;
use App\Src\bussines\groups\application\RequestGroupsList;
use App\Src\bussines\groups\infrastructure\IsGroupsActive;
use App\Src\bussines\groups\infrastructure\GroupsRepositoryMySql;

final class GetGroupsList
{
    private $isActive;
    
    public function __construct(RequestGroupsList $request)
    {
        $this->isActive = $request->isActive();
    }

    public function __invoke()
    {
        $isActive = new IsGroupsActive($this->isActive);
        $repository = new GroupsRepositoryMySql();
        $userFinder = new GroupsFinderList($repository);
        return $userFinder($isActive);
        
        /*
        try{
            return $userFinder($isUsersActive);
        }catch (GroupNotExists $e){
            SessionExceptionMessage::setExceptionMessage($e);
            return null;
        }
        */
    }

}