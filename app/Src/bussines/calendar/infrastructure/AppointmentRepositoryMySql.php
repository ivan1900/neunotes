<?php namespace App\Src\bussines\calendar\infrastructure;

use App\Src\bussines\calendar\domain\IAppointmentRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CISelect;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\calendar\domain\Appointment;

class AppointmentRepositoryMySql extends CIRepository implements IAppointmentRepository
{
    public function searchByCriteria(Criteria $criteria): ?array
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $select = new CISelect($criteriaSQL);
        $arrayObj = $this->db->selectSql($select->querySelect());
        //$appointments = $this->convertToAppointment($arrayObj);
        return $arrayObj;
    }

    private function convertToAppointment($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }
        foreach($arrayObj as $item)
        {
            $appointments[] = Appointment::fromValues($item);        
        }
        return $appointments;
    }
}