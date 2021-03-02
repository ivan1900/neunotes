<?php namespace App\Src\bussines\groups\infrastructure;

use App\Src\bussines\groups\domain\IGroupsSpecification;
use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;

class IsGroupsActive implements IGroupsSpecification
{
    public function __construct(
        private $isActive
        )
    {}

    public function isSatisfied():string
    {
        $criteria = new Criteria(
            'grupos',
            $this->fields(), 
            $this->joins(),
            $this->filters(),
            $this->order(),
            $this->offset(),
            $this->limit()
        );  

        $criteriaToSql = new CriteriaToSql($criteria);
        return $criteriaToSql->querySelect();

    }

    private function fields()
    {
        $fields[0] = new Field('uuid, name, menufront, menubackend, active, created_at, updated_at, deleted_at');
        return $fields;
    }
    
    private function joins()
    {
        return null;
    }

    private function filters()
    {
        $filters[] = new Filter(null,'active','=','"'.$this->isActive.'"');
        return null;
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