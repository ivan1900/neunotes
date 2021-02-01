<?php namespace App\Src\bussines\session\domain;

class EntitySession
{
    private $userName;
    private $language;
    private $userUuid;
    
    public function __construct($userName, $language, $userUuid)
    {
        $this->userName = $userName;
        $this->language = $language;
        $this->userUuid = $userUuid;
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

}