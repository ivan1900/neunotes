<?php namespace App\Controllers;

use App\Src\bussines\customers\application\GetCustomersList;
use App\Src\bussines\session\application\IsSession;
use App\Src\bussines\session\domain\EntitySession;
use App\Src\bussines\session\application\GetSession;

class CustomersRes extends BaseController
{
    public function getCustomersList()
    {
        if (!IsSession::result()) return redirect()->to(site_url($this->getConfigRoot().'fail'));
        $this->session = GetSession::entity();
        $customersList = new GetCustomersList();
        $result = $customersList();
        echo json_encode($result);
    }

   
}