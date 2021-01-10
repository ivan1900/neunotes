<?php namespace App\Src\bussines\users\domain;

class Sha256Encode{

    public static function execute($value){
        return hash('sha256', $value);
    }
}