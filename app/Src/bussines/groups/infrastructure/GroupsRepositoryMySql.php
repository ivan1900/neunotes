<?php namespace App\Src\bussines\groups\infrastructure;

use App\Src\bussines\groups\domain\IGroupsRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\groups\domain\TypeGroup;

final class GroupsRepositoryMySql extends CIRepository implements IGroupsRepository
{
    public function searchByCriteria(Criteria $criteria): ?array
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $arrayObj = $this->db->selectSql($criteriaSQL->querySelect());
        $groups = $this->convertToTypegroup($arrayObj);
        return $groups;
    }

    private function convertToTypegroup($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }
        foreach($arrayObj as $item)
        {
            $groups[] = TypeGroup::fromValues($item);        
        }
        return $groups;
    }

}