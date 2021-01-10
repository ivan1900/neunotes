<?php

declare(strict_types = 1);

namespace App\Src\bussines\customers\domain;

use App\Src\domain\criteria;

interface ICustomerRepository
{
    public function save($customer);

    public function saveAll($customer);

    public function search($id);

    public function searchByCriteria($criteriaSql);

    public function searchByUserName($user);
}