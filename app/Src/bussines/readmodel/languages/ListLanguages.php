<?php namespace App\Src\bussines\readmodel\languages;

class ListLanguages
{
    public $id;
    public $value;

    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }
    
    public static function new(...$args)
    {
        return new self(...$args);
    }

    
}