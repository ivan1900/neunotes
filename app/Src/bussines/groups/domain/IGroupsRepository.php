<?php namespace App\Src\bussines\groups\domain;

interface IGroupsRepository
{
   
    public function searchByCriteria(IGroupsSpecification $criteria): ?array;
    //private function convertToTypegroup($arrayObj);

}