<?php namespace App\Controllers;

use App\Src\bussines\session\application\SessionExceptionMessage;
use App\Src\bussines\configuration\application\GetConfigLanguage;
use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\language\application\LanguageErrorCodes;
use App\Src\bussines\users\application\login\UserLoginCheck;
use App\Src\bussines\users\application\login\RequestLogin;

class Login extends BaseController
{
    private $repository;
    private $dataToView;
      
    public function index()
    {
        $exception = new SessionExceptionMessage();
        $this->dataToView['exception'] = $exception->getExceptionMessage();        
        
        $language = $this->getLanguage();
        $this->dataToView['langMap'] = CurrentLanguage::get($language);
        $this->dataToView['title'] = 'login';
        $this->showView();
    }

    public function signUp(){
        helper(['form', 'url']);

        if (!$this->validate([
            'user' => 'required',
            'pass' => 'required',
        ])) {
            $this->showView();
        } else {
            $requestLogin = new RequestLogin($_POST);
            $language = LanguageErrorCodes::get($this->getLanguage());
            try{
                $authUser = new UserLoginCheck($requestLogin);
            }catch (\Exception $e){
                SessionExceptionMessage::setHackExceptionMessage($language[$e->getMessage()]);
                return redirect()->to(site_url('login')); 
            }
            
            if ($authUser->execute()){
                return redirect()->to(site_url('home'));
            }
            SessionExceptionMessage::setHackExceptionMessage($language['1000']);
            
            return redirect()->to(site_url('login'));   
        }
    }
    
    private function getLanguage()
    {
        try{
            return GetConfigLanguage::execute()->value();
        }catch(\Exception $e){
            return redirect()->to(site_url('configfail'));
        }
    }

    public function showView(){
        echo view('headers/header.php');
        echo view('login',$this->dataToView);
        echo view('footers/footer.php');
    }
    
}