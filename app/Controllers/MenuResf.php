<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use  App\Src\bussines\menu\application\GetMenu;
use App\Src\bussines\groups\application\RequestMenuAuth;
use App\Src\bussines\groups\application\GetMenuAuth;
use App\Src\bussines\users\application\GetUser;
use App\Src\bussines\users\application\RequestUser;
use App\Src\bussines\language\application\CurrentLanguage;


class MenuResf extends ResourceController
{
    protected $format = 'json';
    private $language;

    public function show($user = null)
    {
        $request = new RequestUser($user);
        $getUser = new GetUser($request);
        $user = $getUser->execute();
        $this->language = $user->language();
        $userUuid = $user->uuid();
        

        $requestMenuAuth = new RequestMenuAuth($userUuid);
		$getMenuAuth = new GetMenuAuth();
		try{
			$menuAuth = $getMenuAuth($requestMenuAuth);
		}catch(\Exception $e){
			return $this->failNotFound("Usuario sin permisos");
		}

        $menu = new GetMenu();
		$items = $menu->execute($menuAuth);
        $items = $this->translate($items);

        return $this->respond($items);

    }

    private function translate($items)
    {
        $langMap = CurrentLanguage::get($this->language);
        foreach ($items as &$item)
        {
            $item->item = $langMap[$item->item];
        }
        return $items;
    }

    
}