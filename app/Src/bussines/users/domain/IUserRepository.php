<?php namespace App\Src\bussines\users\domain;

interface IUserRepository
{
    public function save(User $user);

    public function saveAll($users);

    public function search($id);

    public function searchByCriteria(IUserSpecification $specification);

    public function searchByUserName(IUserSpecification $usuario);
}