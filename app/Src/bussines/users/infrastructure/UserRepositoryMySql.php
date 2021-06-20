<?php

namespace App\Src\bussines\users\infrastructure;

use App\Src\bussines\users\domain\User;
use App\Src\bussines\users\domain\IUserRepository;
use App\Src\bussines\users\domain\IUserSpecification;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\users\application\ResponseUser;
use App\Src\bussines\users\application\ResponseUserList;
use DateTimeZone;

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
            $responseDTO[] = ResponseUserList::new(...$item);        
        }

        return $responseDTO;
    }

    public function save(User $user)
    {
        $date = new \DateTime("now", new DateTimeZone('UTC'));
        $data = [
            'uuid' => $user->uuid()->value(),
            'name' => $user->name()->value(),
            'user' => $user->user()->value(),
            'password' => $user->passwordSha256(),
            'phone' => $user->phone()->value(),
            'email' => $user->email()->value(),
            'address' => $user->address()->value(),
            'position' => $user->position()->value(),
            'rol' => $user->role()->value(),
            'language' => $user->language()->value(),
            'active' => $user->active()->value(),
            'timezone' => $user->timezone()->value(),
            'created_at' => $date->format('Y-m-d H:i')
        ];   
        
        $this->db->insertData('users', $data);
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