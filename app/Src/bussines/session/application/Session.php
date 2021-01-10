<?php namespace App\Src\bussines\session\application;

use App\Src\bussines\session\domain\EntitySession;

class Session
{
  
    public function __construct(EntitySession $session)
    {
        $_SESSION['language']=$session->getlanguage();
        $_SESSION['user']=$session->getUser();
        $_SESSION['userid']=$session->getUserId();
        
    }

}