<?php namespace App\Src\bussines\calendar\domain;

use App\Src\shared\domain\criteria\Criteria;

interface IAppointmentTypeRepository
{
    public function getAll(Criteria $criteria): ?array;
    //private function convertToAppointment($arrayObj);
}