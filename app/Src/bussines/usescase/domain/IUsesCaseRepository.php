<?php

declare(strict_types = 1);

namespace App\Src\bussines\usescase\domain;

interface IUsesCaseRepository
{
    //public function insert($useCase);

    public function searchByCriteria($criteria):?array;
}