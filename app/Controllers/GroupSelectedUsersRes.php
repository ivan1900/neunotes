<?php namespace App\Controllers;

use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\users\application\GetUsersInGroup;

class GroupSelectedUsersRes extends BaseController 
{
    public function get()
    {
        if (!IsSession::result()) return redirect()->to(site_url('/fail'));
        $groupId = $_POST['groupId'];
        $usersInGroup = new GetUsersInGroup();
        $listUsersInGroup = $usersInGroup($groupId);
        echo json_encode($listUsersInGroup);
    }

    
}