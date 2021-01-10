<?php namespace App\Src\bussines\calendar\application;

use App\Src\bussines\calendar\domain\IAppointmentTypeRepository;

class AppointmentTypeFinder
{
    private $repository;

    public function __construct(IAppointmentTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($criteria)
    {
        $appointments = $this->repository->getAll($criteria);
        return $appointments;
    } 
}