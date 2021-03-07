<?php namespace App\Src\bussines\users\infrastructure;

use App\Src\bussines\users\domain\IUserSpecification;
use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;

class CriteriaUsersList implements IUserSpecification
{
    public function __construct(
        private $isActive
        )
    {}

    public function isSatisfied():string
    {
        $criteria = new Criteria(
            'users',
            $this->fields(), 
            $this->joins(),
            $this->filters(),
            $this->order(),
            $this->offset(),
            $this->limit()
        );  

        $criteriaToSql = new CriteriaToSql($criteria);
        $tmp = $criteriaToSql->querySelect();
        return $criteriaToSql->querySelect();

    }

    private function fields()
    {
        $fields[0] = new Field('id, name, user, position, address, phone, email, active');
        return $fields;
    }
    
    private function joins()
    {
        return null;
    }

    private function filters()
    {
        $filters[] = new Filter(null,'active','=','"'.$this->isActive.'"');
        $filters[] = new Filter('AND', 'deleted_at',' IS ','NULL');
        return $filters;
    }

    private function order()
    {
        return null;
    }

    private function offset()
    {
        return null;
    }

    private function limit()
    {
        return null;
    }
}