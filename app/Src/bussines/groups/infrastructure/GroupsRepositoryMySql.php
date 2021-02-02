<?php namespace App\Src\bussines\groups\infrastructure;

use App\Src\bussines\groups\domain\IGroupsRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\groups\domain\IGroupsSpecification;


final class GroupsRepositoryMySql extends CIRepository implements IGroupsRepository
{
    public function searchByCriteria(IGroupsSpecification $specification): ?array
    {
        $sql = $specification->selectSatisfying();
        $arrayObj = $this->db->selectSql($sql);
        
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