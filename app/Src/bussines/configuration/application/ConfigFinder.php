<?php namespace App\Src\bussines\configuration\application;

use App\Src\bussines\configuration\domain\IConfigRepository;
use App\Src\bussines\configuration\domain\ConfigNotExist;

final class ConfigFinder
{
    private $repository;

    public function __construct(IConfigRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($name)
    {
        $config = $this->repository->searchByProperty($name);

        if (null === $config)
        {
            throw new ConfigNotExist($name);
        }
        return $config;
    }
}
