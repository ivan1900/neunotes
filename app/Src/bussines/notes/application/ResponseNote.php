<?php namespace App\Src\bussines\notes\application;

final class ResponseNote
{
    public static function new(...$args)
    {        
        return new self(...$args);
    }

    public function __construct(
        private $uuid = null,
        private $title,
        private $content,
        private $created_at,
        private $updated_at = null
    )
    {}

    public function uuid()
    {
        return $this->uuid;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function created_at()
    {
        return $this->created_at;
    }

    public function updated_at()
    {
        return $this->updated_at;
    }

}