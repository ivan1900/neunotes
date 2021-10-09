<?php namespace App\Src\bussines\notes\application;

final class RequestCreateNote
{
    public function __construct(
        public $title,
        public $content
    )
    {   
    }
}