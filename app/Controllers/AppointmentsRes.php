<?php namespace App\Controllers;

use App\Src\bussines\calendar\application\GetAppointmentsById;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\domain\EntitySession;
use App\Src\bussines\session\application\GetSession;

class AppointmentsRes extends BaseController
{
    public function index()
    {
        echo "test";
    }

    public function getAppointmentsID()
    {
        if (!IsSession::result()) return redirect()->to(site_url($this->getConfigRoot().'fail'));
        $this->session = GetSession::entity();
        $appointments = new GetAppointmentsById();
        $result = $appointments($this->session->getUserid());
        echo json_encode($result);
    }

    public function getAppointmentsAll()
    {

    }

    public function setAppointment()
    {
        if (!IsSession::result()) return redirect()->to(site_url($this->getConfigRoot().'fail'));
        
    }


}