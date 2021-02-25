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
        //if (!IsSession::result()) return redirect()->to(site_url('/login'));
        $this->session = GetSession::entity();
        $request = new RequestUserList($isActive = true);
        $getUsers = new GetUsersList($request);
        $response['users'] = (array) $getUsers();
        foreach($response['users'][0] as $key => $item)
        {
            $header[] = $key;
        }
        //unset($response['users']);
        $response['header'] = $header;
        $response['vueTable2Language'] = LanguageVueTable2::get($this->session->language());
        echo json_encode($response);
    }

    public function getUsersListLanguage()
    {
       // if (!IsSession::result()) return redirect()->to(site_url('/login'));
        $this->session = GetSession::entity();
        $langMap = CurrentLanguage::get($this->session->language());
        $response['$langMap'] = [
            'filter' => $langMap['filter'],
            'records' => $langMap['records'],
            'showing' => $langMap['showing'],
            'to' => $langMap['to'],
            'of' => $langMap['of'],
            'name' => $langMap['name'],
            'position' => $langMap['position'],
            'options' => $langMap['options']
        ]; 
        
        echo json_encode($response);
    }

}