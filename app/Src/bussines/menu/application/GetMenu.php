<?php namespace App\Src\bussines\menu\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\menu\infrastructure\MenuRepositoryMySql;

Class GetMenu
{
    private $menuBackend;
    //tomara por inyección los datos recibidos de los roles y pedira los menus que necesite
    public function __construct($menuAuthIsAdmin)
    {
        $this->menuBackend = false;
        if ($menuAuthIsAdmin){
            $this->menuBackend = true;
        }
    }

    public function getItems()
    {
        $criteria = new Criteria('menu',$this->fields(),null,$this->filters(),$this->order(),null,null);
        $repository = new MenuRepositoryMySql();
        $menuFinder = new MenuFinder($repository);
        return $menuFinder($criteria);   
    }

    private function fields()
    {
        $fields[0] = new Field('*');
        return $fields;
    }

    private function filters()
    {
        $filters[] = new Filter(' or ','esfront','=','true');
        if ($this->menuBackend){
            $filters[] = new Filter(' or ','esbackend','=',$this->menuBackend);
        }
        
        return $filters;
    }

    private function order()
    {
        $order= ' zorder ASC ';
        return $order;
    }
}