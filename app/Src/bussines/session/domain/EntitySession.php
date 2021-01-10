<?php namespace App\Src\bussines\session\domain;

class EntitySession
{
    private $userName;
    private $language;

    public function __construct($userName, $language)
    {
        $this->userName = $userName;
        $this->language = $language;
    }

    public function language()
    {
        return $this->language;
    }

    public function userName()
    {
        return $this->userName;
    }

}