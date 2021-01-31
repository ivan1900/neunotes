<?php namespace App\Src\bussines\groups\domain;

use App\Src\bussines\groups\domain\IGroupsSpecification;

abstract class IsUserInGroup implements IGroupsSpecification
{
    private $userUuid;

    public function __construct($userUuid)
    {
        $this->id = $userUuid;
    }

    public function isSatisfiedBy(Group $group)
    {
        return $group->isUserInGroup($this->userUuid);
    }
}