<?php namespace App\Src\shared\domain\criteria;

interface ICriteriaToSql
{
    //public function construct(ICriteria $criteria);
    public function table(): string;
    public function convertFields(): string;
    public function convertWhere(): ?string;
    public function convertJoin(): ?string;
    public function convertOrder(): ?string;
    public function convertOffset(): ?int;
    public function convertLimit(): ?int;
}