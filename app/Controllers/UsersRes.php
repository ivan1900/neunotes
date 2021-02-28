<?php namespace App\Controllers;

use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\users\application\GetUsersList;
use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\language\application\LanguageVueTable2;
use App\Src\bussines\users\application\RequestUserList;

class UsersRes extends BaseController
{
    public function getUsersList()
    {
        if (!IsSession::result()) return redirect()->to(site_url('/login'));
        $this->session = GetSession::entity();
        $request = new RequestUserList($isActive = true);
        $getUsers = new GetUsersList($request);
        $response['users'] = (array) $getUsers();
        foreach($response['users'][0] as $key => $item)
        {
            $header[] = $key;
        }
        
        $response['header'] = $header;
        $response['heading'] = $this->translate($header);
        $response['vueTable2Language'] = LanguageVueTable2::get($this->session->language());
        echo json_encode($response);
    }

    private function translate($header)
    {
        $this->session = GetSession::entity();
        $langMap = CurrentLanguage::get($this->session->language());
        foreach($header as $item)
        {
            $response[$item] = $langMap[$item];
        }
        
        return($response);
    }

}