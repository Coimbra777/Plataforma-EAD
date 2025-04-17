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
        return $this->repository->create($data);
    }
}
