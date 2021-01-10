<?php namespace App\Src\bussines\customers\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\customers\domain\Customer;
use App\Src\bussines\customers\application\CustomersFinderList;
use App\Src\bussines\customers\infrastructure\CustomerRepositoryMySql;

class GetCustomersList
{
    public function __invoke()
    {
        $criteria = new Criteria('orclipro',$this->fields(),null,null,null,null,null);
        $repository = new CustomerRepositoryMySql();
        $customerFinderList = new CustomersFinderList($repository);
        return $customerFinderList($criteria);       
    }

    private function fields()
    {
        $fields[0] = new Field('idorclipro');
        $fields[1] = new Field('nombre');
        return $fields;
    }

    
}