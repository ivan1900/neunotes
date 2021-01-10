<?php namespace App\Src\bussines\groups\infrastructure;

use App\Src\shared\infrastructure\codeigniter\CIRepository;

class SetGroupRepository extends CIRepository
{
    
    public function setData($table, $data)
    {
        $this->db->insertData($table,$data);
    }

    public function removeSql($delete)
    {
        $this->db->removeSql($delete);
    }
}