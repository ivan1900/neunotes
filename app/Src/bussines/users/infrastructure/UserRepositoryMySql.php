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
        $arrayObj = $this->db->selectSqlArray($sql);
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
            $responseDTO[] = ResponseUser::new(...$item);        
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

    public function searchByUserName(IUserSpecification $specification)
    {
        $sql = $specification->isSatisfied();  
        $object = $this->db->selectSqlArray($sql);
        $response = ResponseUser::new(...$object[0]);
        return $response;   
    }

}