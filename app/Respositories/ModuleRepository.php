<?php

namespace App\Respositories;

use App\Models\Module;

class ModuleRepository
{
    protected $entity;

    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getAllModules()
    {
        return $this->entity->get();
    }

    public function createNewModule(array $data)
    {
        return $this->entity->create($data);
    }

    public function getModuleByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->firstOrFail();
    }

    public function updateModuleByuuid(string $uuid, array $data)
    {
        $course = $this->getModuleByUuid($uuid);

        return $course->update($data);
    }

    public function deleteModule(string $uuid)
    {
        $course = $this->getModuleByUuid($uuid);

        return $course->delete();
    }
}
