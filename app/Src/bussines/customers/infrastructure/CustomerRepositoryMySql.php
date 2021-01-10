<?php

namespace App\Src\bussines\customers\infrastructure;

use App\Src\bussines\customers\domain\Customer;
use App\Src\bussines\customers\domain\ICustomerRepository;
use App\Src\shared\criteria\criteria;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CISelect;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;


final class CustomerRepositoryMySql extends CIRepository implements ICustomerRepository
{
    private $table = 'orclipro';

    public function searchByCriteria($criteria)
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $select = new CISelect($criteriaSQL);
        $arrayObj = $this->db->selectSql($select->querySelect());
        return $arrayObj;
    }

    public function save($customer)
    {

    }

    public function saveAll($customer)
    {

    }

    public function search($id)
    {
        
    }

    public function searchByUserName($user): ?Customer
    {
        $arrayObj = $this->db->searchByName($this->table, 'usuario', $user);
        if (empty($arrayObj))
        {
            return null;
        }else
        return new Customer($arrayObj->id, $arrayObj->name, $arrayObj->user, $arrayObj->password, $arrayObj->DNI);
    }

}