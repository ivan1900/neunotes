<?php namespace App\Src\bussines\menu\infrastructure;

use App\Src\bussines\menu\domain\IMenuRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CISelect;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\menu\domain\Menu;

final class MenuRepositoryMySql extends CIRepository implements IMenuRepository
{
    public function searchByCriteria(Criteria $criteria): ?array
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $select = new CISelect($criteriaSQL);
        $arrayObj = $this->db->selectSql($select->querySelect());
        $menu = $this->convertToMenu($arrayObj);
        return $menu;
    }

    public function convertToMenu($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }
        foreach($arrayObj as $item)
        {
            $groups[] = Menu::fromValues($item);        
        }
        return $groups;
    }

}
