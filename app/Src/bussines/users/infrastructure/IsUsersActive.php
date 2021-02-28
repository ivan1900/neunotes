<?php namespace App\Src\bussines\users\infrastructure;

use App\Src\bussines\users\domain\IUserSpecification;
use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;

class IsUsersActive implements IUserSpecification
{
    public function __construct(
        private $isActive
        )
    {}

    public function isSatisfied():string
    {
        $criteria = new Criteria(
            'usuarios',
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
        $fields[0] = new Field('uuid, nombre, usuario, cargo, direccion, telefono, mail, activo, rol, borrado, created_at, updated_at, deleted_at');
        return $fields;
    }
    
    private function joins()
    {
        return null;
    }

    private function filters()
    {
        $filters[0] = new Filter(null,'activo','=','"'.$this->isActive.'"');
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