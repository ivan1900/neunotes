<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\domain\IGroupsRepository;
use App\Src\bussines\groups\domain\IGroupsSpecification;

final class GroupsFinderList
{
    private $repository;

    public function __construct(IGroupsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(IGroupsSpecification $specification):array
    {
        $groups = $this->repository->searchByCriteria($specification);

        return $groups;
    }
}