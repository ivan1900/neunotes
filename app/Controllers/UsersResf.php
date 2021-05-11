<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Src\bussines\users\application\GetUsersList;
use App\Src\bussines\language\application\CurrentLanguage;
//use App\Src\bussines\language\application\LanguageTable;
use App\Src\bussines\users\application\RequestUserList;
use App\Src\bussines\users\application\GetUser;
use App\Src\bussines\users\application\RequestUser;
use App\Src\bussines\counters\application\ActiveUsersCounter;
use App\Src\bussines\readmodel\languages\GetLanguagesList;
use App\Src\bussines\language\application\LanguageForms;
use DateTime;

class UsersResf extends ResourceController
{
    protected $format = 'json';
    private $language;

    public function list($language, $from, $to){
        $this->language = $language;

        $request = new RequestUserList($isActive = true, $from, $to);
        $getUsers = new GetUsersList($request);
        $response['users'] = $getUsers();
        
        if($this->language == 'spanish'){
            foreach($response['users'] as $key => $item){
                $date = new DateTime();
                $date->setTimestamp(strtotime($item->created_at));
                $response['users'][$key]->created_at = $date->format('d-m-Y h:i');
            }
        }
        
        foreach($response['users'][0] as $key => $item)
        {
            $header[] = $key;
        }
        
        $response['header'] = $header;
        $response['heading'] = $this->translate($header);
        //$response['vueTable'] = LanguageTable::get($this->session->language());     
        $activeUsersCounter = new ActiveUsersCounter();
        $response['activeUsersCounter'] = $activeUsersCounter();

        return $this->respond($response);
    }
    
    public function show($user = null)
    {
        $request = new RequestUser($user);
        $getUser = new GetUser($request);
        $user = $getUser->execute();
        $data= [
            "name" => $user->name(),
            "language" => $user->language(),
            "position" => $user->position()
        ];
        return $this->respond($data);
    }

    public function userForm($language)
    {
        $languages = new GetLanguagesList();
        $data['languages'] = $languages->getData();
        $data['langMap'] = LanguageForms::get($language);

        return $this->respond($data);
    }
   
    private function translate($content)
    {
        $langMap = CurrentLanguage::get($this->language);
        foreach($content as $item)
        {
            $response[$item] = $langMap[$item];
        }       
        return($response);
    }
}
