<?php namespace App\Src\bussines\users\domain\login;

interface IUserLoginRepository
{
    public function searchByUserName($usuario);
}