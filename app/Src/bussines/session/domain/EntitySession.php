<?php namespace App\Src\bussines\session\domain;

class EntitySession
{
    private $userName;
    private $language;
    private $userUuid;
    private $isUserAdmin;
    
    public function __construct($userName, $language, $userUuid, $isUserAdmin)
    {
        $this->userName = $userName;
        $this->language = $language;
        $this->userUuid = $userUuid;
        $this->isUserAdmin = $isUserAdmin;
    }

    public function language()
    {
        return $this->language;
    }

    public function userName()
    {
        return $this->userName;
    }

    public function userUuid()
    {
        return $this->userUuid;
    }

    public function isUserAdmin()
    {
        return $this->isUserAdmin;
    }

}