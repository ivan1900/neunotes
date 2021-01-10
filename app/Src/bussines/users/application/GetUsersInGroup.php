<?php namespace App\Src\bussines\users\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\application\UserFinder;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;

class GetUsersInGroup
{
    private $groupId;
    
    public function __invoke($groupId)
    {
        $this->groupId = $groupId;
        $criteria = new Criteria('usuarios',$this->fields(),$this->joins(),$this->filters(),null,null,null);
        $repository = new UserRepositoryMySql();
        $userFinder = new UserFinderList($repository);
        $data = $userFinder($criteria);
        return $data;
    }

    private function fields()
    {
        $fields[0] = new Field('idusuario');
        $fields[1] = new Field('nombre');
        $fields[2] = new Field('usuario');
        return $fields;
    }
    
    private function joins()
    {
        $joins[0] = new Join('inner','interusergroup','usuarios.idusuario', '=', 'interusergroup.usuarioid');
        return $joins;   
    }

    private function filters()
    {
        $filters[0] = new Filter(null,'activo','=','1');
        $filters[1] = new Filter('and','interusergroup.grupoid','=',$this->groupId);
        return $filters;
    }
}