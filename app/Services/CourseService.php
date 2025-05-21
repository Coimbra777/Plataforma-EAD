<?php

namespace App\Services;

use App\Respositories\CourseRepository;

class CourseService
{
    protected $repository;
    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }


    public function getCourses()
    {
        return $this->repository->getAllCourses();
    }

    public function createNewCourse(array $data)
    {
        return $this->repository->createNewCourse($data);
    }

    public function getCourse(string $identify)
    {
        return $this->repository->getCourseByIdentify($identify);
    }

    public function updateCourse(string $identify, array $data)
    {
        return $this->repository->updateCourseByIdentify($identify, $data);
    }

    public function deleteCourse(string $identify)
    {
        return $this->repository->deleteCourse($identify);
    }
}
