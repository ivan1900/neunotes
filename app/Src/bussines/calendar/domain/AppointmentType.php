<?php namespace App\Src\bussines\calendar\domain;

final class AppointmentType
{
    private $id;
    private $duration;
    private $title;

    public function __construct($id, $duration, $title)
    {
        $this->id = $id;
        $this->duration = $duration;
        $this->title = $title;
    }

    public static function fromValues(object $values):self
    {
        return new self($values->id, $values->duration, $values->title);
    }

    public function id()
    {
        return $this->id;
    }

    public function duration()
    {
        return $this->duration;
    }

    public function title()
    {
        return $this->name;
    }
}