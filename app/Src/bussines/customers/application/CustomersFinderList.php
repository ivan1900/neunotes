<?php namespace App\Src\bussines\customers\application;

use App\Src\bussines\customers\domain\ICustomerRepository;
use App\Src\bussines\customers\domain\Customer;

final class CustomersFinderList
{
    private $repository;

    public function __construct(ICustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($criteria): array
    {
        $customerList = $this->repository->searchByCriteria($criteria);
        
        return $customerList;
    }
}