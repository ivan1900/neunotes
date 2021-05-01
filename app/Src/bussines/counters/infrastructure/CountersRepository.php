<?php namespace App\Src\bussines\counters\infrastructure;

use App\Src\bussines\counters\domain\ICountersRepository;
use App\Src\bussines\counters\domain\ICounterSpecification;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\counters\application\ResponseCounter;

class CountersRepository extends CIRepository implements ICountersRepository
{
    public function searchByCriteria(ICounterSpecification $specification)
    {
        $sql = $specification->isCounter();
        $result = $this->db->selectSqlArray($sql);
        $response = new ResponseCounter($result[0]['item'], $result[0]['value']);
        return $response;
    }
}