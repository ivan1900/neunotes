<?php namespace App\Src\bussines\groups\domain;

use App\Src\bussines\groups\domain\Group;

class IsMenuAdminSpecification
{
    public function isSatisfiedBy(Group $group){
        return $group->menuBackend();
    }
}
