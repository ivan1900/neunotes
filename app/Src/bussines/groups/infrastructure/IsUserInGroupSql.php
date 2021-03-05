<?php namespace App\Src\bussines\groups\infrastructure;

use App\Src\bussines\groups\domain\IGroupsSpecification;
use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;

class IsUserInGroupSql implements IGroupsSpecification
{
    private $userUuid;
 
    public function __construct($userUuid)
    {
        $this->userUuid = $userUuid;
    }

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
        $fields[] =  new Field('grupos.id, grupos.uuid, grupos.name, grupos.menufront, grupos.menubackend, grupos.active,
        grupos.created_at, grupos.updated_at, grupos.deleted_at');
        return $fields;
    }
    
    private function joins()
    {
        $joins[0] = new Join('inner','interusergroup','grupos.uuid', '=', 'interusergroup.groupUuid');
        return $joins;
    }

    private function filters()
    {
        $filters[0] = new Filter(null,'interusergroup.userUuid','=','"'.$this->userUuid.'"');
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