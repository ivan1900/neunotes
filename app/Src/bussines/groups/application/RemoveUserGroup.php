<?php namespace App\Src\bussines\groups\application;

use App\Src\bussines\groups\infrastructure\SetGroupRepository;

class RemoveUserGroup
{
    private $data;

    public function __construct($groupId, $userId)
    {
        $this->data['grupoid'] = $groupId;
        $this->data['usuarioid'] = $userId;
    }

    public function remove()
    {
        $repository = new SetGroupRepository();
        $query = "delete from interusergroup where usuarioid = " . $this->data['usuarioid'] . " and grupoid = " . $this->data['grupoid'];
        $repository->removeSql($query);
    }
}