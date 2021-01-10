<?php namespace App\Src\bussines\groups\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\groups\application\GroupTypeFinder;
use App\Src\bussines\groups\infrastructure\GroupsRepositoryMySql;
use App\Src\bussines\groups\domain\UserNotGroups;
use App\Src\bussines\session\application\SessionExceptionMessage;

final class GetGroupsList
{
    public function __invoke()
    {
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

    private function fields()
    {
        $fields[0] = new Field('*');
        return $fields;
    }
}