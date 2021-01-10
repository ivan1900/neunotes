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
use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\groups\application\GetGroupById;

class GroupEdit extends BaseController
{
    private $dataToView;
	private $dataToMenu;
	private $dataToTopbar;
    private $language;
    
    public function index($id)
	{
		if (!IsSession::result()) return redirect()->to(site_url(base_url().'/login'));

		$this->dataToView['exception']	= new sessionExceptionMessage();
		$this->session = GetSession::entity();
		$this->language = $this->session->getLanguage();
		$this->getLanguage();

		$groupType = new TypeGroups($this->getTypeGroup());
		//$iterator = $groupType->getIterator();
			
		if (is_null($groupType))
		{
			return redirect()->to(site_url(base_url().'/configfail'));
		}
		
		$menu = new GetMenu($groupType);
		$this->dataToMenu['menu'] = $menu->getItems();
		$this->dataToMenu['user'] = $this->session->getUser();
		$this->dataToMenu['actualPage'] = 'Grupos';

		$this->dataToView['group'] = $this->getGroup($id);
		$this->dataToView['groupId'] = $id;
		$this->renderView();
	}
	
	private function getGroup($id)
	{
		$getGroup = new GetGroupById();
		return $getGroup($id);
	}
    
    private function getTypeGroup()
	{
		$idUser = $this->session->getUserId();
		$groupType = new GetGroupType($idUser);
		return $groupType($idUser);
	}

	private function getLanguage()
	{
		$langObject = new CurrentLanguage($this->language);
		$this->dataToView['langMap'] = $langObject->getLanguage();
		$this->dataToTopbar['langMap'] = $langObject->getLanguage();
    }
    
    private function renderView()
    {
        echo view('headers/header.php');
        echo view('menu', $this->dataToMenu);
        echo view('bar/topbar',$this->dataToTopbar);
        echo view('groupedit', $this->dataToView);
        echo view('bar/footbar');
		echo view('footers/footer_groupedit.php');
    }

}