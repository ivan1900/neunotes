<?php namespace App\Controllers;

use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\users\application\GetUsersAvailable;
class GroupAvailableUsersRes extends BaseController
{
    public function get()
    {
        if (!IsSession::result()) {
            return redirect()->to(site_url('/fail'));
        }
        $groupId = $_POST['groupId'];
        //$groupId = 2;
        $usersAvailable = new GetUsersAvailable();
        $listUsersInGroup = $usersAvailable($groupId);
        echo json_encode($listUsersInGroup);
    }
}