<?php namespace App\Controllers;

use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\users\application\GetUsersList;
use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\language\application\LanguageVueTable2;
use App\Src\bussines\users\application\RequestUserList;
use DateTime;

class UsersRes extends BaseController
{
    private $langMap;

    public function getUsersList()
    {
        if (!IsSession::result()) return redirect()->to(site_url('/login'));
        $this->session = GetSession::entity();

        $this->langMap = CurrentLanguage::get($this->session->language());
        
        $request = new RequestUserList($isActive = true);
        $getUsers = new GetUsersList($request);
        $response['users'] = $getUsers();
        //print_r($response['users']);
        foreach ($response['users'] as $item)
        {
            $date = new DateTime();
            $date->setTimestamp($item['created_at']);
            $item['created_at'] = $date->format('d-m-Y');
        }
        foreach($response['users'][0] as $key => $item)
        {
            $header[] = $key;
        }
        
        $response['header'] = $header;
        $response['heading'] = $this->translate($header);
        $response['vueTable2Language'] = LanguageVueTable2::get($this->session->language());
        
        $response['boolean'] = [
            'yes' => $this->langMap['yes'],
            'no' => $this->langMap['no']
        ];

        echo json_encode($response);
    }

    private function translate($header)
    {
        foreach($header as $item)
        {
            $response[$item] = $this->langMap[$item];
        }       
        return($response);
    }

}