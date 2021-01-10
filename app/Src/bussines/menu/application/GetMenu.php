<?php namespace App\Src\bussines\menu\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\menu\infrastructure\MenuRepositoryMySql;

Class GetMenu
{
    private $menuFront;
    private $menuBackend;
    //tomara por inyección los datos recibidos de los roles y pedira los menus que necesite
    public function __construct($typeGroups)
    {
        $this->menuBackend = false;
        $this->manuFront = false;
        foreach($typeGroups as $typeGroup)
        {
            if($typeGroup->menufront()){
                $this->menuFront = true;
            }
            if($typeGroup->menubackend())
            {
                $this->menuBackend = true;
            }
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
        if ($this->menuFront){
            $filters[] = new Filter(' or ','esfront','=',$this->menuFront);
        }
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