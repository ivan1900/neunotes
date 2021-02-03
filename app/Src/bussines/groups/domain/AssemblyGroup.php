<?php namespace App\Src\bussines\groups\domain;

use App\Src\bussines\groups\domain\GroupMenuBackend;
use App\Src\bussines\groups\domain\GroupMenuFront;
use App\Src\bussines\groups\domain\GroupName;
use App\Src\bussines\groups\domain\GroupUuid;

final class AssemblyGroup
{
    private $groupUuid;
    private $groupName;
    private $groupMenuBackend;
    private $groupMenuFront;

    public function construct($value)
    {
        $this->groupUuid = GroupUuid::fromValues($value->groupUuid());
        $this->groupName = GroupName::fromValues($value->name());
        $this->groupMenuBackend = GroupMenuBackend::fromValues($value->menuBackend());
        $this->groupMenuFront = GroupMenuFront::fromValues($value->menuFront());
    }

    public function groupUuid()
    {
        return $this->groupUuid;
    }

    public function groupName()
    {
        return $this->groupName;
    }

    public function menuBackend()
    {
        return $this->menuBackend;
    }

    public function menuFront()
    {
        return $this->menuFront;
    }
}