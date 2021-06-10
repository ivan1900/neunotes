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
use App\Src\bussines\groups\application\GetGroupsList;
use App\Src\bussines\groups\application\RequestGroupsList;
use App\Src\bussines\users\application\RequestCreateUser;
use DateTime;
use DateTimeZone;

class UsersResf extends ResourceController
{
    protected $format = 'json';
    private $language;

    public function list($language, $timezone, $from, $to){
        $this->language = $language;

        $request = new RequestUserList($isActive = true, $from, $to);
        $getUsers = new GetUsersList($request);
        $response['users'] = $getUsers();
        
        if($this->language == 'spanish'){
            foreach($response['users'] as $key => $item){
                $date = new DateTime($item->created_at, new DateTimeZone('UTC'));
                $date->setTimezone(new DateTimeZone(str_replace('_','/',$timezone)));
                $response['users'][$key]->created_at = $date->format('d-m-Y H:i');
            }
        }
        
        foreach($response['users'][0] as $key => $item)
        {
            $header[] = $key;
        }
        
        $response['header'] = $header;
        $response['heading'] = $this->translate($header);
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
            "position" => $user->position(),
            "timezone" => $user->timezone()
        ];
        return $this->respond($data);
    }

    public function userForm($language)
    {
        $languages = new GetLanguagesList();
        $data['languages'] = $languages->getData();

        $requestGroups = new RequestGroupsList();
        $roles = new GetGroupsList($requestGroups);
        $langMap = CurrentLanguage::get($language);
        $rolList = $roles();
        foreach($rolList as $key => $item){
            $rolList[$key]->name = $langMap[$item->name];
        }

        $data['roles'] = $rolList;
        $data['langMap'] = LanguageForms::get($language);

        $timeZones = DateTimeZone::listIdentifiers();

        $cities = array_unique($timeZones);
        ksort($cities);
        $data['timeZones'] = $cities;

        return $this->respond($data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'OPTIONS') {
            $requestCreateUser = new RequestCreateUser(
                user: $_POST['user'],
                name: $_POST['name'],
                password: $_POST['password'],
                position: $_POST['position'],
                address: $_POST['address'],
                phone: $_POST['phone'],
                email: $_POST['email'],
                active: $_POST['active'],
                language: $_POST['language'],
                role: $_POST['role']
            );
            
            
        } 
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
