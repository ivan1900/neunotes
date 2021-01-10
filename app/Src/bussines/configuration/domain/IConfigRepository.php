<?php namespace App\Src\bussines\configuration\domain;

use App\Src\domain\criteria;

interface IConfigRepository
{
    public function save($configuration);

    public function searchByProperty($property);

}
