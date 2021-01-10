<?php namespace App\Src\bussines\calendar\domain;

use App\Src\shared\domain\criteria\Criteria;

interface IAppointmentRepository
{
    public function searchByCriteria(Criteria $criteria): ?array;
    //private function convertToAppointment($arrayObj);
}