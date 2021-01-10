<?php namespace App\Controllers;

use App\Src\bussines\users\application\GetUsersList;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\domain\EntitySession;
use App\Src\bussines\session\application\GetSession;

class UsersRes extends BaseController
{
    public function getUsersList()
    {
        if (!IsSession::result()) return redirect()->to(site_url($this->getConfigRoot().'fail'));
        $this->session = GetSession::entity();
        $userList = new GetusersList();
        $result = $userList();
        echo json_encode($result);
    }

}