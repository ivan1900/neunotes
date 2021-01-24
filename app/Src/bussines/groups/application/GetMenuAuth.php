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
use App\Src\bussines\groups\application\RequestMenuAuth;


final class GetMenuAuth
{
    private $userUuid;

    public function __invoke(RequestMenuAuth $uuid)
    {
        $this->userUuid = $uuid;
        $criteria = new Criteria('grupos',$this->fields(), $this->joins() , $this->filters(),null,null,null);
        $repository = new GroupsRepositoryMySql();
        $groupFinder = new GroupTypeFinder($repository);
        try
        {
            return $groupFinder($this->userUuid, $criteria);
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
        $filters[0] = new Filter(null,'interusergroup.usuarioid','=',$this->userUuid);
        return $filters;
    }

    private function joins()
    {
        $joins[0] = new Join('inner','interusergroup','grupos.uuid', '=', 'interusergroup.grupoid');
        return $joins;
    }

}