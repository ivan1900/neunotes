<?php namespace App\Src\bussines\counters\application;

class ResponseCounter
{
    public $item;
    public $value;

    public function __construct($item, $value)
    {
        $this->item = $item;
        $this->value = $value;
    }
}