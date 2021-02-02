<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\domain\IGroupsRepository;
use App\Src\bussines\groups\domain\IGroupsSpecification;
use App\Src\bussines\groups\domain\UserNotGroups;

final class GroupTypeFinder
{
    private $repository;

    public function __construct(IGroupsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($userUuid, IGroupsSpecification $specification):array
    {
        $groups = $this->repository->searchByCriteria($specification);
        
        if (null === $groups){
            throw new UserNotGroups($userUuid);
        }

        return $groups;
    }
}