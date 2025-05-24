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

    public function getModulesByCourse($courseId)
    {
        return $this->entity->where('course_id', $courseId)->get();
    }

    public function createNewModule(array $data)
    {
        return $this->entity->create($data);
    }

    public function getModuleByCourse($courseId, string $identify)
    {
        return $this->entity->where('identify', $identify)->where('course_id', $courseId)->firstOrFail();
    }

    public function updateModuleByCourse($courseId, string $identify, array $data)
    {
        $module = $this->getModuleByCourse($courseId, $identify);

        return $module->update($data);
    }

    public function deleteModule(int $courseId, string $identify)
    {
        $module = $this->getModuleByCourse($courseId, $identify);

        return $module->delete();
    }
}
