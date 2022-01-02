<?php 

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{
    private $repository;
    private $courseRepository;

    public function __construct(
        ModuleRepository $repository,
        CourseRepository $courseRepository
    ){
        $this->repository = $repository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse(string $course_identify)
    {
        $course = $this->courseRepository->getCourseByUuid($course_identify);

        return $this->repository->getModuleCourse($course->id);
    }

    public function createNewModule(array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->repository->createNewModule($course->id, $data);
    }

    public function getModuleByCourse(string $course_identify, string $identify)
    {
        $course = $this->courseRepository->getCourseByUuid($course_identify);
        return $this->repository->getModuleByCourse($course->id, $identify);
    }

    public function updateModule(string $identify, array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->repository->updateModuleByUuid($course->id, $identify, $data);
    }

    public function deleteModule(string $identify)
    {
        return $this->repository->deleteModuleByUuid($identify);
    }
}