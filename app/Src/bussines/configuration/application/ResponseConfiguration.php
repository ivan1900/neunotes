<?php namespace App\Src\bussines\configuration\application;

class ResponseConfiguration
{
    private $property;
    private $value;

    public function __construct($response)
    {
        $this->property = $response['propiedad'];
        $this->value = $response['valor'];
    }

    public function property()
    {
        return $this->property;
    }

    public function value()
    {
        return $this->value;
    }
}
