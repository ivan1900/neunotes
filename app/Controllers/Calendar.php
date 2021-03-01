<?php namespace App\Controllers;


use App\Src\bussines\calendar\application\GetAppointmentType;

use App\Src\bussines\session\application\GetSession;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\menu\application\GetMenu;
use App\Src\bussines\language\application\CurrentLanguage;
class Calendar extends BaseController
{
    private $dataToView;
    private $dataToMenu;
    
    public function index()
    {
		if (!IsSession::result()) return redirect()->to(site_url('/login'));

		$this->dataToView['exception']	= new sessionExceptionMessage();
		$this->session = GetSession::entity();

		$menu = new GetMenu();

		$this->dataToMenu['user'] = $this->session->userName();
		$this->dataToMenu['menu'] = $menu->execute($this->session->isUserAdmin());
		$this->dataToMenu['isAdmin'] = ($this->session->isUserAdmin());
		$this->dataToMenu['actualPage'] = 'calendar';

		$appointmentTypes = new GetAppointmentType();
		$this->dataToView['appointmentTypes'] = $appointmentTypes();

		$this->renderView();
    }

   	private function renderView()
	{
		echo view('headers/header_calendar.php');
		echo view('menu', $this->dataToMenu);
		echo view('calendar', $this->dataToView);
		echo view('footers/footer_calendar.php');
	}
	
}