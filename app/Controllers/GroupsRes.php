<?php namespace App\Controllers;


use App\Src\bussines\groups\application\RemoveUserGroup;
use App\Src\bussines\groups\application\SetUserGroup;

use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
//use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\groups\application\RequestGroupsList;
use App\Src\bussines\groups\application\GetGroupsList;

class GroupsRes extends BaseController 
{
    public function getGroupsList()
    {
        if (!IsSession::result()) return redirect()->to(site_url('/login'));
        $this->session = GetSession::entity();
        $request = new RequestGroupsList($isActive = true);
		$getGroups = new GetGroupsList($request);
		echo json_encode($getGroups());
    }

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