<?php namespace App\Src\bussines\menu\application;

use App\Src\bussines\menu\domain\IMenuRepository;

Class MenuFinder 
{
    private $repository;

    public function __construct(IMenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($criteria)
    {
        $menu = $this->repository->searchByCriteria($criteria);
        return $menu;
    }
}