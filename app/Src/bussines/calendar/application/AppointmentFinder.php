<?php namespace App\Src\bussines\calendar\application;

use App\Src\bussines\calendar\domain\IAppointmentRepository;

class AppointmentFinder
{
    private $repository;

    public function __construct(IAppointmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($criteria)
    {
        $appointments = $this->repository->searchByCriteria($criteria);
        return $appointments;
    }
}