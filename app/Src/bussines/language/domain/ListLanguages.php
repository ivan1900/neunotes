<?php namespace App\Src\bussines\language\domain;

class ListLanguages
{
    private $list = [];

    public function _construct()
    {
        $this->list = [
            'Spanish',
            'English'
        ];
    }
}