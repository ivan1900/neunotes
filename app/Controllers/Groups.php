<?php namespace App\Controllers;

use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\menu\application\GetMenu;
use App\Src\bussines\language\application\CurrentLanguage;
//use App\Src\bussines\groups\application\RequestGroupsList;
//use App\Src\bussines\groups\application\GetGroupsList;

class Groups extends BaseController
{
    private $dataToView;
	private $dataToMenu;
	private $dataToTopbar;
    
    public function index()
	{
		if (!IsSession::result()) return redirect()->to(site_url('/login'));
		
		$this->dataToView['exception']	= new sessionExceptionMessage();
		$this->session = GetSession::entity();

		$menu = new GetMenu();
		$this->dataToMenu['user'] = $this->session->userName();
		$this->dataToMenu['menu'] = $menu->execute($this->session->isUserAdmin());
		$this->dataToMenu['isAdmin'] = ($this->session->isUserAdmin());
		$this->dataToMenu['actualPage'] = 'groups';

		$this->dataToView['langMap'] = CurrentLanguage::get($this->session->language());
		$this->dataToTopbar['langMap'] = CurrentLanguage::get($this->session->language());
/*
		$request = new RequestGroupsList($isActive = true);
		$getGroups = new GetGroupsList($request);
		$this->dataToView['groupsList'] = $getGroups();
*/		
		$this->renderView();
    }
    
    
    private function renderView()
    {
        echo view('headers/header_users.php');
        echo view('menu', $this->dataToMenu);
        echo view('bar/topbar',$this->dataToTopbar);
        echo view('groups', $this->dataToView);
        echo view('bar/footbar');
		echo view('footers/footer_users.php');
    }

}