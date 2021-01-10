<?php

namespace App\Src\bussines\users\infrastructure;

use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\domain\IUserRepository;
use App\Src\shared\criteria\criteria;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CISelect;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;


final class UserRepositoryMySql extends CIRepository implements IUserRepository
{
    private $table = 'usuarios';

    public function searchByCriteria($criteria)
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $select = new CISelect($criteriaSQL);
        $arrayObj = $this->db->selectSql($select->querySelect());
        return $arrayObj;
    }

    public function save($user)
    {

    }

    public function saveAll($users)
    {

    }

    public function search($id)
    {
        
    }

    public function searchByUserName($usuario): ?User
    {
        $arrayObj = $this->db->searchByName($this->table, 'usuario', $usuario);
        if (empty($arrayObj))
        {
            return null;
        }
        return new User($arrayObj->idusuario,$arrayObj->usuario,$arrayObj->pass,$arrayObj->rol);
    }

}