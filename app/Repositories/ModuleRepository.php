<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected $model;

    public function __construct(Module $model)
    {
        $this->model = $model;
    }

    public function getModuleCourse(int $course_id)
    {
        return $this->model->where('course_id', $course_id)->get();
    }

    public function createNewModule(int $course_id, array $data)
    {
        $data['course_id'] = $course_id;
        return $this->model->create($data);
    }

    public function getModuleByCourse(int $course_id, string $identify)
    {
        return $this->model->where('course_id', $course_id)->where('uuid', $identify)->firstOrFail();
    }

    public function getModuleByUuid(string $identify)
    {
        return $this->model->where('uuid', $identify)->firstOrFail();
    }

    public function updateModuleByUuid(int $course_id, string $identify, array $data)
    {
        $module = $this->getModuleByUuid($identify);

        $data['course_id'] = $course_id;

        return $module->update($data);
    }

    public function deleteModuleByUuid(string $identify)
    {
        $module = $this->getModuleByUuid($identify);

        return $module->delete();
    }
}