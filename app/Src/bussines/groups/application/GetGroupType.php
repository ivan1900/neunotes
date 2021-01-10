<?php namespace App\Src\bussines\groups\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
//use App\Src\bussines\groups\domain\TypeGroup;
use App\Src\bussines\groups\application\GroupTypeFinder;
use App\Src\bussines\groups\infrastructure\GroupsRepositoryMySql;
use App\Src\bussines\groups\domain\UserNotGroups;
use App\Src\bussines\session\application\SessionExceptionMessage;

final class GetGroupType
{
    private $userId;

    public function __invoke(int $id)
    {
        $this->userId = $id;
        $criteria = new Criteria('grupos',$this->fields(), $this->joins() , $this->filters(),null,null,null);
        $repository = new GroupsRepositoryMySql();
        $groupFinder = new GroupTypeFinder($repository);
        try
        {
            return $groupFinder($this->userId, $criteria);
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

    private function filters()
    {
        $filters[0] = new Filter(null,'interusergroup.usuarioid','=',$this->userId);
        return $filters;
    }

    private function joins()
    {
        $joins[0] = new Join('inner','interusergroup','grupos.id', '=', 'interusergroup.grupoid');
        return $joins;
    }

}