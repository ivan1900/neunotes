<?php namespace App\Src\shared\infrastructure\codeigniter;

use App\Src\shared\domain\criteria\ICriteria;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\ICriteriaToSql;
final class CriteriaToSql implements ICriteriaToSql
{
    private $criteria;

    public function __construct(ICriteria $criteria)
    {
        $this->criteria = $criteria;
    }

    public function table(): string
    {
        $table = $this->criteria->mainTable();
        return $table;
    }

    public function convertFields(): string
    {
        $fields = $this->criteria->fields();
        if (is_null($fields)) {return " * ";}
        $fieldCollection = ' ';
        foreach ($fields as $key => $field)
        {
            if ($key == 0)
            {
                $fieldCollection = $fieldCollection . $field->item();
            }else{
                $fieldCollection = $fieldCollection . ', ' . $field->item();
            }
        }
        return $fieldCollection;
    }

    public function convertWhere(): ?string
    {
        $wheres = $this->criteria->filters();
        if (!$this->criteria->hasFilters()) {return null;}
        $where = ' ';
        foreach ($wheres as $key => $filter)
        {
            if ($key == 0)
            {
                $where = $where . $filter->field() .  $filter->operator() . $filter->value() .' ';
            }else{
                $where = $where . $filter->logicOperator() .' ' . $filter->field() .  $filter->operator() . $filter->value() .' ';
            }
        }
        return $where;
    }

    public function convertJoin(): ?string
    {
        $joins = $this->criteria->joins();
        if(is_null($joins)) {return null;}
        //$join = ' inner join ';
        foreach ($this->criteria->joins() as $condition)
        {
            $join = ' ' . $condition->typeJoin() . ' join ' . $condition->tableToJoin() . ' ON ' . $condition->fieldtable1() . $condition->operator() . $condition->fieldToJoin();
        }
        return $join;
    }

    public function convertOrder(): ?string
    {
        $order = $this->criteria->order();
        if(is_null($order)){
            return null;
        }
        return $order;
    }

    public function convertOffset(): ?int
    {
        $offset = $this->criteria->offset();
        if(is_null($offset)){
            return null;
        }
        return $offset;
    }

    public function convertLimit(): ?int
    {
        $limit = $this->criteria->limit();
        if(is_null($limit)){
            return null;
        }
        return $limit;
    }
    
}