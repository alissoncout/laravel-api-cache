<?php 

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
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
        return $this->repository->getCourseByUuid($identify);
    }

    public function deleteCourse(string $identify)
    {
        return $this->repository->deleteCourseByUuid($identify);
    }

    public function updateCourse(string $identify, array $data)
    {
        return $this->repository->updateCourseByUuid($identify, $data);
    }
}