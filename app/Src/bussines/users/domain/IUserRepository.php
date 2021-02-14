<?php

declare(strict_types = 1);

namespace App\Src\bussines\users\domain;

use App\Src\domain\criteria;

interface IUserRepository
{
    public function save($user);

    public function saveAll($users);

    public function search($id);

    public function searchByCriteria(IUserSpecification $specification);

    public function searchByUserName($usuario);
}