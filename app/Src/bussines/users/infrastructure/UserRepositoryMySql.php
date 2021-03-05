<?php

namespace App\Src\bussines\users\infrastructure;

use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\users\domain\IUserSpecification;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\users\application\ResponseUser;


final class UserRepositoryMySql extends CIRepository implements IUserRepository
{

    public function searchByCriteria(IUserSpecification $specification)
    {
        $sql = $specification->isSatisfied();
        $arrayObj = $this->db->selectSql($sql);
        return $this->madeArrayDTO($arrayObj);
    }

    private function madeArrayDTO($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }

        foreach($arrayObj as $item)
        {
            $responseDTO[] = new ResponseUser($item);        
        }

        return $responseDTO;
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
    /*    $arrayObj = $this->db->searchByName($this->table, 'usuario', $usuario);
        if (empty($arrayObj))
        {
            return null;
        }
        return new User($arrayObj->idusuario,$arrayObj->usuario,$arrayObj->pass,$arrayObj->rol);
        */
    }

}