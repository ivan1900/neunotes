<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Src\bussines\session\domain\IEntitySession;
use App\Src\bussines\session\domain\EntityException;
use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\groups\application\GetGroupType;
use App\Src\bussines\groups\domain\TypeGroups;
use App\Src\bussines\menu\domain\Menus;
use App\Src\bussines\menu\application\GetMenu;

class Home extends BaseController
{
	
	private $dataToView;
	private $dataToMenu;
	
	public function index()
	{
		if (!IsSession::result()) return redirect()->to(site_url(base_url().'login'));

		$this->dataToView['exception']	= new sessionExceptionMessage();
		$this->session = GetSession::entity();
		
		$groupType = new TypeGroups($this->getTypeGroup());
			
		if (is_null($groupType))
		{
			return redirect()->to(site_url(base_url().'/configfail'));
		}
		
		$menu = new GetMenu($groupType);
		$this->dataToMenu['menu'] = $menu->getItems();
		$this->dataToMenu['user'] = $this->session->getUser();
		$this->dataToMenu['actualPage'] = 'home';
		
		$this->renderView();
	}

	private function getTypeGroup()
	{
		$idUser = $this->session->getUserId();
		$groupType = new GetGroupType($idUser);
		return $groupType($idUser);
	}

	private function renderView()
	{
		echo view('headers/header.php');
		echo view('menu', $this->dataToMenu);
		echo view('dashboard', $this->dataToView);
		echo view('footers/footer.php');
	}

	
}