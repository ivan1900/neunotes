<?php namespace App\Src\bussines\menu\application;

use App\Src\bussines\menu\infrastructure\MenuRepositoryMySql;

Class GetMenu
{
    //tomara por inyección los datos recibidos de los roles y pedira los menus que necesite
    public function __construct($menuIsAdmin)
    {
        $repository = new MenuRepositoryMySql();
        $menuFinder = new MenuFinder($repository);

        return $menuFinder($menuIsAdmin);
    }
}