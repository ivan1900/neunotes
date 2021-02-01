<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\domain\IGroupsRepository;
use App\Src\bussines\groups\domain\UserNotGroups;

final class GroupTypeFinder
{
    private $repository;

    public function __construct(IGroupsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($userUuid, $criteria):array
    {
        $groups = $this->repository->searchByCriteria($criteria);
        
        if (null === $groups){
            throw new UserNotGroups($userUuid);
        }

        return $groups;
    }
}