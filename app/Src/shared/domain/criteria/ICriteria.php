<?php namespace App\Src\shared\domain\criteria;

Interface ICriteria
{
    public function __construct($mainTable, $fields, ?array $joins, ?array $filters, ?string $order, ?int $offset, ?int $limit);
    
    public function hasFilters(): bool;
    
    public function hasOrder(): bool;
    
   /* public function plainFilters(): array; */

    public function mainTable();

    public function fields(): ?array;
    
    public function filters(): ?array;

    public function joins(): ?array;
    
    public function order(): ?string;
    
    public function offset(): ?int;
    
    public function limit(): ?int;
    
}