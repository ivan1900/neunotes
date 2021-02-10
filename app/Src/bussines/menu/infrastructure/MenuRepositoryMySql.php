<?php namespace App\Src\bussines\menu\infrastructure;

use App\Src\bussines\menu\domain\IMenuRepository;
use App\Src\bussines\menu\application\ResponseMenu;
use App\Src\shared\infrastructure\codeigniter\CIRepository;

final class MenuRepositoryMySql extends CIRepository implements IMenuRepository
{
    public function getMenu($isAdmin): ?array
    {
        $sql = 'SELECT * FROM menu WHERE esfront = 1 and esbackend = ' . $isAdmin;
        $result = $this->db->selectSql($sql);
        return $this->madeArrayDto($result);
    }

    public function madeArrayDto($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }
        foreach($arrayObj as $item)
        {
            $collection[] = new ResponseMenu($item);        
        }
        return $collection;
    }

}
