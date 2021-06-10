<?php namespace App\Src\bussines\users\application;

final class ResponseUserList
{
    public static function new(...$args)
    {        
        return new self(...$args);
    }

    public function __construct(
        public $id,
        public $name,
        public $user,
        public $phone,
        public $email,
        public $active,
        public $address,
        public $position,
        public $created_at,
    )
    {}
    

}