<?php namespace App\Src\bussines\calendar\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\calendar\infrastructure\AppointmentTypeMySql;
use App\Src\bussines\calendar\application\AppointmentTypeFinder;

Class GetAppointmentType {
    
    public function __invoke()
    {
        $criteria = new Criteria('appointmentstype',$this->fields(), null, null,null,null,null);
        $repository = new AppointmentTypeMySql();
        $AppointmentTypeFinder = new AppointmentTypeFinder($repository);
        return $AppointmentTypeFinder($criteria);
    }

    private function fields()
    {
        $fields[0] = new field('*');
        return $fields;
    }
}