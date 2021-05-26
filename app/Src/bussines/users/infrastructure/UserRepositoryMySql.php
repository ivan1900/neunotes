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

    public function save(User $user)
    {
        $data = [
            'uuid' => $user->uuid()->value(),
            'name' => $user->name()->value(),
            'user' => $user->user()->value(),
            'password' => $user->password()->value(),
            'phone' => $user->phone()->value(),
            'email' => $user->email()->value(),
            'address' => $user->address()->value(),
            'position' => $user->position()->value(),
            'role' => $user->role()->value(),
            'language' => $user->language()->value(),
            'active' => $user->active()->value()
        ];   
        $this->db->insertData('user', $data);
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