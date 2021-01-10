<?php namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\groups\domain\TypeGroup;

interface IGroupsRepository
{
   
    public function searchByCriteria(Criteria $criteria): ?array;
    //private function convertToTypegroup($arrayObj);

}