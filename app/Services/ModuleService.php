<?php

namespace App\Services;

use App\Respositories\CourseRepository;
use App\Respositories\ModuleRepository;

class ModuleService
{
    protected $moduleRepository;
    protected $courseRepository;
    public function __construct(
        ModuleRepository $moduleRepository,
        CourseRepository $courseRepository
    ) {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse($course)
    {
        $course = $this->courseRepository->getCourseByIdentify($course);

        return  $this->moduleRepository->getModulesByCourse($course->id);
    }

    public function createNewModule(array $data, $course)
    {
        $course = $this->courseRepository->getCourseByIdentify($course);
        $data['course_id'] = $course->id;

        return $this->moduleRepository->createNewModule($data);
    }

    public function getModuleByCourse(string $course, string $identify)
    {
        $course = $this->courseRepository->getCourseByIdentify($course);

        return $this->moduleRepository->getModuleByCourse($course->id, $identify);
    }

    public function updateModuleByCourse($course,  $identify, array $data)
    {
        $course = $this->courseRepository->getCourseByIdentify($course);

        return $this->moduleRepository->updateModuleByCourse($course->id, $identify, $data);
    }

    public function deleteModule($courseIdentify, $identify)
    {
        $course = $this->courseRepository->getCourseByIdentify($courseIdentify);

        return $this->moduleRepository->deleteModule($course->id, $identify);
    }
}
