<?php namespace App\Src\bussines\menu\domain;

use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\groups\domain\Menu;

interface IMenuRepository
{
    public function getMenu($isAdmin): ?array;
}