<?php namespace App\Src\bussines\notes\application;

final class RequestCreateNote
{
    public function __construct(
        public $uuid = null,
        public $title,
        public $content
    )
    {   
    }
}