<?php

namespace App\Repositories;

use App\Models\Lesson;
use Illuminate\Support\Facades\Cache;

class LessonRepository
{
    protected $model;

    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    public function getLessonModule(int $course_id)
    {
        return $this->model->where('module_id', $course_id)->get();
    }

    public function createNewLesson(int $module_id, array $data)
    {
        $data['module_id'] = $module_id;
        Cache::forget('courses');
        return $this->model->create($data);
    }

    public function getLessonByModule(int $module_id, string $identify)
    {
        return $this->model->where('module_id', $module_id)->where('uuid', $identify)->firstOrFail();
    }

    public function getLessonByUuid(string $identify)
    {
        return $this->model->where('uuid', $identify)->firstOrFail();
    }

    public function updateLessonByUuid(int $module_id, string $identify, array $data)
    {
        $module = $this->getLessonByUuid($identify);

        $data['module_id'] = $module_id;

        Cache::forget('courses');

        return $module->update($data);
    }

    public function deleteLessonByUuid(string $identify)
    {
        $module = $this->getLessonByUuid($identify);

        Cache::forget('courses');

        return $module->delete();
    }
}