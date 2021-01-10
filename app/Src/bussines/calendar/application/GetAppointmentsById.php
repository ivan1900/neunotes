<?php namespace App\Src\bussines\calendar\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\calendar\infrastructure\AppointmentRepositoryMySql;
use App\Src\bussines\calendar\application\AppointmentFinder;

Class GetAppointmentsById
{
    private $userId;

    public function __invoke(int $id)
    {
        $this->userId = $id;
        $criteria = new Criteria('appointments',$this->fields(), $this->joins(), $this->filters(),null,null,null);
        $repository = new AppointmentRepositoryMySql();
        $AppointmentFinder = new AppointmentFinder($repository);
        return $AppointmentFinder($criteria);
    }

    private function fields()
    {
        $fields[0] = new field('appointments.*');
        $fields[1] = new field('orclipro.nombre');
        return $fields;
    }

    private function joins()
    {
        $joins[0] = new Join('inner','orclipro','appointments.customerid', '=', 'orclipro.idorclipro');
        return $joins;
    }

    private function filters()
    {
        $filters[0] = new filter(null, 'appointments.userId', ' = ', $this->userId);
        return $filters;
    }

}