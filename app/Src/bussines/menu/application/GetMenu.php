<?php namespace App\Src\bussines\menu\application;

use App\Src\bussines\menu\infrastructure\MenuRepositoryMySql;
use App\Src\bussines\menu\application\MenuFinder;

Class GetMenu
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new MenuRepositoryMySql();
    }
    
    public function execute($menuIsAdmin){
        $menuFinder = new MenuFinder($this->repository);
        return $menuFinder($menuIsAdmin);
    }
}