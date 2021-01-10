<?php

declare(strict_types = 1);

namespace App\Src\bussines\users\domain\login;

interface IUserLoginRepository
{
    public function searchByUserName($usuario);
}