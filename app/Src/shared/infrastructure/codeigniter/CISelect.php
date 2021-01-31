<?php namespace App\Src\shared\infrastructure\codeigniter;

use App\Src\shared\domain\criteria\ICriteriaToSql;
final class CISelect 
{
    private $table;
    private $fields;
    private $join;
    private $where;
    private $order;
    private $offset;
    private $limit;
   // private $hasFilters;
   // private $hasOrder;

    public function __construct(CriteriaToSql $criteriaSQL)
    {
        $this->table = $criteriaSQL->table();
        $this->fields = $criteriaSQL->convertFields();
        $this->join = $criteriaSQL->convertJoin();
        $this->where = $criteriaSQL->convertWhere();
        $this->order = $criteriaSQL->convertOrder();
        $this->offset = $criteriaSQL->convertOffset();
        $this->limit = $criteriaSQL->convertLimit();
    }

    public function querySelect()
    {
        $query = 'SELECT ' . $this->fields . ' FROM ' . $this->table;
        $query = (is_null($this->join)) ? $query : $query . $this->join;      
        $query = (is_null($this->where)) ? $query : $query . ' WHERE ' . $this->where;
        $query = (is_null($this->order)) ? $query : $query . ' ORDER BY ' . $this->order;
        $query = (is_null($this->limit)) ? $query : $query . ' LIMIT ' . $this->limit;
        $query = (is_null($this->offset)) ? $query : $query . ' OFFSET ' . $this->offset;
        return $query;
    }
/*
    public function querySelectWhere()
    {
        $query = 'select ' . $this->fields . ' from ' . $this->table . ' where ' . $this->where;
        return $query;
    }

    public function querySelectJoin()
    {
        $query = 'select ' . $this->fields . ' from ' . $this->table . ' inner join ' . $this->join;
        return $query;
    }

    public function querySelectJoinWhere()
    {
        $query = 'select ' . $this->fields . ' from ' . $this->table . $this->join . ' where ' . $this->where;
        return $query;
    }
    */
}