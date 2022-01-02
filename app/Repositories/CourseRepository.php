<?php

namespace App\Repositories;

use App\Models\Course;
use phpDocumentor\Reflection\Types\Boolean;

class CourseRepository
{
    protected $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getAllCourses(bool $loadRelationships = true)
    {
        $query = $this->model;
        if($loadRelationships){
            $query = $query->with('modules.lessons');
        }
        return $query->get();
    }

    public function createNewCourse(array $data)
    {
        return $this->model->create($data);
    }

    public function getCourseByUuid(string $identify, bool $loadRelationships = true)
    {
        $query = $this->model;
        if($loadRelationships){
            $query = $query->with('modules.lessons');
        }
        return $query->where('uuid', $identify)->firstOrFail();
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