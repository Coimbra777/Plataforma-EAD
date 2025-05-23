<?php

namespace App\Services;

use App\Respositories\ModuleRepository;

class ModuleService
{
    protected $repository;
    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;
    }

    public function getModulesByCourse()
    {
        return $this->repository->getAllModules();
    }

    public function createNewModule(array $data)
    {
        return $this->repository->createNewModule($data);
    }

    public function getModuleByCourse(string $uuid)
    {
        return $this->repository->getModuleByUuid($uuid);
    }

    public function updateModuleByCourse(string $uuid, array $data)
    {
        return $this->repository->updateModuleByuuid($uuid, $data);
    }

    public function deleteModule(string $uuid)
    {
        return $this->repository->deleteModule($uuid);
    }
}
