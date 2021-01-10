<?php namespace App\Src\bussines\calendar\infrastructure;

use App\Src\bussines\calendar\domain\IAppointmentTypeRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CISelect;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\calendar\domain\AppointmentType;

class AppointmentTypeMySql extends CIRepository implements IAppointmentTypeRepository
{
    public function getAll(Criteria $criteria): ?array
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $select = new CISelect($criteriaSQL);
        $arrayObj = $this->db->selectSql($select->querySelect());
        return $arrayObj;
    }

}