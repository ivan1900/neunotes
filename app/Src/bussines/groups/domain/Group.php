<?php namespace App\Src\bussines\groups\domain;

use App\Src\bussines\groups\domain\GroupUuid;
use App\Src\bussines\groups\domain\GroupName;
use App\Src\bussines\groups\domain\GroupMenuFront;
use App\Src\bussines\groups\domain\GroupMenuBackend;

final class Group
{
    private $uuid;
    private $name;
    private $menuFront;
    private $menuBackend;
    
    public function __construct(GroupUuid $uuid, GroupName $name, GroupMenuBackend $menuBackend, GroupMenuFront $menuFront)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->menuFront = $menuFront;
        $this->menuBackend = $menuBackend;
    }

    public static function fromValues(object $values):self
    {
        return new self(
            $values->uuid,
            $values->name, 
            $values->menuFront, 
            $values->menuBackend);
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function name()
    {
        return $this->name;
    }

    public function menuFront()
    {
        return $this->menuFront;
    }

    public function menuBackend()
    {
        return $this->menuBackend;
    }

}