<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getAllCourses()
    {
        return $this->model->get();
    }

    public function createNewCourse(array $data)
    {
        return $this->model->create($data);
    }

    public function getCourseByUuid(string $identify)
    {
        return $this->model->where('uuid', $identify)->firstOrFail();
    }

    public function deleteCourseByUuid(string $identify)
    {
        $course = $this->getCourseByUuid($identify);

        return $course->delete();
    }


    public function updateCourseByUuid(string $identify, array $data)
    {
        $course = $this->getCourseByUuid($identify);

        return $course->update($data);
    }
}