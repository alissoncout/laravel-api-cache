<?php 

namespace App\Services;

use App\Repositories\LessonRepository;
use App\Repositories\ModuleRepository;

class LessonService
{
    private $repository;
    private $moduleRepository;

    public function __construct(
        LessonRepository $repository,
        ModuleRepository $moduleRepository
        
    ){
        $this->repository = $repository;
        $this->moduleRepository = $moduleRepository;
    }

    public function getLessonsByModule(string $module_identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($module_identify);

        return $this->repository->getLessonModule($module->id);
    }

    public function createNewLesson(array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->repository->createNewLesson($module->id, $data);
    }

    public function getLessonByModule(string $module_identify, string $identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($module_identify);
        return $this->repository->getLessonByModule($module->id, $identify);
    }

    public function updateLesson(string $identify, array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->repository->updateLessonByUuid($module->id, $identify, $data);
    }

    public function deleteLesson(string $identify)
    {
        return $this->repository->deleteLessonByUuid($identify);
    }
}