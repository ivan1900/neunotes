<?php namespace App\Src\bussines\language\domain;

class English 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            'enpro' => 'EnPro',
            'welcome' => 'Welcome to EnPro',
            'login_do' => 'Login to see the action',
            'login' => 'login',
            'forget_pass' => 'If you have forgotten your password, please contact your system administrator.',
            'slogan' => 'Welcome to EnPro a friendly CRM'
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}

