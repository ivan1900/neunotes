<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Src\bussines\users\application\GetUsersList;
use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\language\application\LanguageVueTable2;
use App\Src\bussines\users\application\RequestUserList;
use App\Src\bussines\users\application\GetUser;
use App\Src\bussines\users\application\RequestUser;
use DateTime;

class UsersResf extends ResourceController
{
    protected $format = 'json';
    private $langMap;

    public function index(){
        //obtener lenguaje desde el usuario, opción1 que lo haga el backend opción 2 guardarlo en el front y se indique en cada petición

        $this->langMap = CurrentLanguage::get($this->session->language());
        
        $request = new RequestUserList($isActive = true);
        $getUsers = new GetUsersList($request);
        $response['users'] = $getUsers();

        if($this->session->language() == 'spanish'){
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
        $response['vueTable2Language'] = LanguageVueTable2::get($this->session->language());     
       /* $response['boolean'] = [
            'yes' => $this->langMap['yes'],
            'no' => $this->langMap['no']
        ];*/

        echo json_encode($response);
    }

    public function show($user = null)
    {
        $request = new RequestUser($user);
        $getUser = new GetUser($request);
        return $this->respond($getUser->execute());
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
