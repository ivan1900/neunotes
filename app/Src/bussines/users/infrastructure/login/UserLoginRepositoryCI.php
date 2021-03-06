<?php

namespace App\Src\bussines\users\infrastructure\login;

use App\Src\bussines\users\domain\login\IUserLoginRepository;
use App\Src\bussines\users\application\login\ResponseLogin;
use App\Models\UserLoginModel;

final class UserLoginRepositoryCI implements IUserLoginRepository
{
    private $db;

    public function __construct()
    {        
        $this->db = new UserLoginModel();
    }

    public function searchByUserName($user)
    {
        $entity = $this->db->find($user);
        if (empty($entity))
        {
            return null;
        }
        $response = new ResponseLogin($entity);

        return $response; 
    }

}