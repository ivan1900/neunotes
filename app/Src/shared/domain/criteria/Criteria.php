<?php
declare(strict_types = 1);
namespace App\Src\shared\domain\criteria;

final class Criteria implements ICriteria
{
    private $mainTable;
    private $fields;
    private $joins;
    private $filters;
    private $order;
    private $offset;
    private $limit;

    public function __construct($mainTable, $fields, ?array $joins, ?array $filters, ?string $order, ?int $offset, ?int $limit)
    {
        $this->mainTable= $mainTable;
        $this->fields  = $fields;
        $this->joins    = $joins;
        $this->filters = $filters;
        $this->order   = $order;
        $this->offset  = $offset;
        $this->limit   = $limit;
    }
    public function hasFilters(): bool
    {
        return !is_null($this->filters);
    }
    public function hasOrder(): bool
    {
        return null !== $this->order;
    }
    public function plainFilters(): array
    {
        return $this->filters->filters();
    }
    public function mainTable()
    {
        return $this->mainTable;
    }
    public function fields(): ?array
    {
        return $this->fields;
    }
    public function filters(): ?array
    {
        return $this->filters;
    }
    public function joins(): ?array
    {
        return $this->joins;
    }
    public function order(): ?string
    {
        return $this->order;
    }
    public function offset(): ?int
    {
        return $this->offset;
    }
    public function limit(): ?int
    {
        return $this->limit;
    }
}