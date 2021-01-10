<?php namespace App\Src\bussines\usescase\infrastructure;

use App\Src\bussines\usescase\domain\IUsesCaseRepository;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\shared\infrastructure\codeigniter\CISelect;
use App\Src\shared\infrastructure\codeigniter\CriteriaToSql;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\usescase\domain\UseCase;

class UsesCaseRepositoryMysql extends CIRepository implements IUsesCaseRepository
{
    public function searchByCriteria($criteria): ?array
    {
        $criteriaSQL = new CriteriaToSql($criteria);
        $select = new CISelect($criteriaSQL);
        $arrayObj = $this->db->selectSql($select->querySelect());
        $usesCase = $this->convertToUseCase($arrayObj);
        return $usesCase;
    }
    
    private function convertToUseCase($arrayObj)
    {
        if (empty($arrayObj))
        {
            return null;
        }
        foreach($arrayObj as $item)
        {
            $usesCase[] = UseCase::fromValues($item);        
        }
        return $usesCase;
    }
}