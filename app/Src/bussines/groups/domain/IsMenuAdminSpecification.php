<?php namespace App\Src\bussines\groups\domain;

use App\Src\bussines\groups\domain\Group;

class isMenuAdminSpecification
{
    public function isSatisfiedBy(Group $group){
        return $group->menuBackend();
    }
}
