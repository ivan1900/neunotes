<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\infrastructure\SetGroupRepository;

class SetUserGroup
{
    private $data;

    public function __construct($groupId, $userId)
    {
        $this->data['grupoid'] = $groupId;
        $this->data['usuarioid'] = $userId;
    }

    public function insert()
    {
        $repository = new SetGroupRepository();
        $repository->setData('interusergroup',$this->data);
    }
}