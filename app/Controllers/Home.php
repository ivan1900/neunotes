<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Src\bussines\menu\domain\Menus;
use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\session\application\SessionIsUserAdmin;
use App\Src\bussines\groups\application\GetGroupType;
use App\Src\bussines\menu\application\GetMenu;
use App\Src\bussines\groups\application\RequestMenuAuth;
use App\Src\bussines\groups\application\GetMenuAuth;

class Home extends BaseController
{
	private $dataToView;
	private $dataToMenu;
	
	public function index()
	{
		if (!IsSession::result()) return redirect()->to(site_url(base_url().'login'));

		$this->dataToView['exception']	= new sessionExceptionMessage();
		$this->session = GetSession::entity();

		$requestMenuAuth = new RequestMenuAuth($this->session->userUuid());
		$getMenuAuth = new GetMenuAuth();
		try{
			$menuAuth = $getMenuAuth($requestMenuAuth);
		}catch(\Exception $e){
			return redirect()->to(site_url('/configfail'));
		}

		SessionIsUserAdmin::handle($menuAuth);	
		
		$menu = new GetMenu($menuAuth);
		$this->dataToMenu['menu'] = $menu;
		$this->dataToMenu['user'] = $this->session->getUser();
		$this->dataToMenu['actualPage'] = 'home';
		
		$this->renderView();
	}

	private function renderView()
	{
		echo view('headers/header.php');
		echo view('menu', $this->dataToMenu);
		echo view('dashboard', $this->dataToView);
		echo view('footers/footer.php');
	}

	
}