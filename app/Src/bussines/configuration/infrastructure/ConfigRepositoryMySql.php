<?php namespace App\Src\bussines\configuration\infrastructure;

use App\Src\bussines\configuration\application\ResponseConfiguration;
use App\Src\bussines\configuration\domain\IConfigRepository;
use App\Models\ConfigModel;

class ConfigRepositoryMySql implements IConfigRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new ConfigModel();
    }

    public function searchByProperty($property)
    {
        $response = $this->db->find($property);
        if (empty($response)){
            return null;
        } 
        return new ResponseConfiguration($response);
    }
    
    public function save($configuration)
    {
    
    }
}