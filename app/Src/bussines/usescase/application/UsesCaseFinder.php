<?php namespace App\Src\bussines\usescase\application;

use App\Src\bussines\usescase\domain\IUsesCaseRepository;
use App\Src\bussines\usescase\domain\UseCaseNotExists;

class UsesCaseFinder
{
    private $repository;

    public function __construct(IUsesCaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($criteria)
    {
        $usesCase = $this->repository->searchByCriteria($criteria);

        if (null === $usesCase)
        {
            throw new UseCaseNotExists("");
        }

        return $usesCase;
    }
}