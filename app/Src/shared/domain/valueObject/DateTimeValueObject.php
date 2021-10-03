<?php namespace App\Src\shared\domain\valueObject;

use DateTime;
use DateTimeZone;

class DateTimeValueObject
{
    protected $value;

    public function __construct(?string $value)
    {
        $this->value = $value;
    }

    public function value(): string 
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }

    public function now($timezone)
    {
        $date = new DateTime($this->value, new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone(str_replace('_','/',$timezone)));
        return $date->format('d-m-Y H:i');
    }
}
