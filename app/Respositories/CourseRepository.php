<?php

namespace App\Respositories;

use App\Models\Course;

class CourseRepository
{
    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->get();
    }

    public function createNewCourse(array $data)
    {
        return $this->entity->create($data);
    }

    public function getCourseByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->firstOrFail();
    }

    public function updateCourseByIdentify(string $identify, array $data)
    {
        $course = $this->getCourseByIdentify($identify);

        return $course->update($data);
    }

    public function deleteCourse(string $identify)
    {
        $course = $this->getCourseByIdentify($identify);

        return $course->delete();
    }
}
