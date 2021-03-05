<?php namespace App\Src\bussines\groups\infrastructure;

use App\Src\bussines\groups\domain\IGroupsRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\groups\domain\IGroupsSpecification;
use App\Src\bussines\groups\application\ResponseUserInGroups;


final class GroupsRepositoryMySql extends CIRepository implements IGroupsRepository
{
    public function searchByCriteria(IGroupsSpecification $specification): ?array
    {
        $sql = $specification->isSatisfied();
        $arrayObj = $this->db->selectSqlArray($sql);
        return $this->madeArrayDTO($arrayObj);
    }

    private function madeArrayDTO($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }

        foreach($arrayObj as $item)
        {
            $responseDTO[] = ResponseUserInGroups::new(...$item);        
        }

        return $responseDTO;
    }

}