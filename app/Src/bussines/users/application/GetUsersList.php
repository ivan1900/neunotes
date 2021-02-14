<?php namespace App\Src\bussines\users\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\application\UserFinderList;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;

class GetUsersList
{
    public function __construct()
    {
        
    }

    public function __invoke()
    {


        $criteria = new Criteria('usuarios',$this->fields(),null,null,null,null,null);
        $repository = new UserRepositoryMySql();
        $userFinder = new UserFinderList($repository);
        return $userFinder($criteria);
    }

    private function fields()
    {
        $fields[0] = new Field('idusuario');
        $fields[1] = new Field('nombre');
        $fields[2] = new Field('usuario');
        $fields[3] = new Field('rol');
        $fields[4] = new Field('activo');
        return $fields;
    }
  
}