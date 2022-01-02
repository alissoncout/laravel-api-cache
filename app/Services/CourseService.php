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
}