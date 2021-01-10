<?php namespace App\Src\bussines\calendar\domain;

Class Appointment
{
    private $id;
    private $title;
    private $description;
    private $startDate;
    private $endDate;
    private $customerId;
    private $userId;
    private $creationDate;

    public function _construct($id, $title, $description, $startDate, $endDate, $customerId, $userId, $creationDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->customer = $customer;
        $this->user = $custormer;
        $this->user = $creationDate;
    }

    public static function fromValues(object $values):self
    {
        return new self($values->id, $values->title, $values->description, $values->startDate, $values->endDate, $values->customerId, $values->userId, $values->creationDate);
    }

    public function id()
    {
        return $this->id;
    }    

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function startDate()
    {
        return $this->startDate;
    }

    public function endDate()
    {
        return $this->endDate;
    }

    public function customer()
    {
        return $this->customer;
    }

    public function user()
    {
        return $this->user;
    }

    public function creationDate()
    {
        return $this->creationDate;
    }

}
