<?php namespace App\Controllers;

use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\groups\application\RemoveUserGroup;
use App\Src\bussines\groups\application\SetUserGroup;

class GroupRes extends BaseController 
{
    public function userRemove()
    {
        if (!IsSession::result()) return redirect()->to(site_url('/fail'));
        $groupId = $_POST['groupId'];
        $userId = $_POST['userId'];
        $GroupUserRemove = new RemoveUserGroup($groupId, $userId);
        $result = $GroupUserRemove->remove();
        return true;
    }

    public function set()
    {
        if (!IsSession::result()) return redirect()->to(site_url('/fail'));
        $groupId = $_POST['groupId'];
        $userId = $_POST['userId'];
        $setUserGroup = new SetUserGroup($groupId,$userId);
        $setUserGroup->insert();
        return true;
    }
}