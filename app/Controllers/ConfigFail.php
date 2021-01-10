<?php namespace App\controllers;

use App\Src\bussines\session\application\Session;
use App\Src\bussines\session\application\SessionExceptionMessage;

class ConfigFail extends BaseController
{
    private $dataToView;

    public function index()
    {
        $exception = new SessionExceptionMessage(); 
        $this->dataToView['exception'] = $exception->getExceptionMessage();
        $this->showView();
    }

    public function showView(){
        echo view('headers/header.php');
        echo view('configfail',$this->dataToView);
        echo view('footers/footer.php');
    }


}