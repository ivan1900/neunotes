<?php namespace App\Controllers;

use App\Src\bussines\calendar\application\GetAppointmentType;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\domain\EntitySession;
use App\Src\bussines\session\application\GetSession;

class AppointmentTypesRes extends BaseController
{
    public function getAppointmentTypes()
    {
        if (!IsSession::result()) return redirect()->to(site_url($this->getConfigRoot().'fail'));
        $appointmentTypes = new GetAppointmentType();
        $result['appointmentTypes'] = $appointmentTypes();
        echo json_encode($result);
    }

}