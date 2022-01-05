<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController
};
use Illuminate\Support\Facades\Route;


Route::apiResource('/modules/{module_identify}/lessons', LessonController::class);

Route::apiResource('/courses/{course_identify}/modules', ModuleController::class);

Route::get('/courses', [CourseController::class, 'index']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses/{identify}', [CourseController::class, 'show']);
Route::put('/courses/{identify}', [CourseController::class, 'update']);
Route::delete('/courses/{identify}', [CourseController::class, 'destroy']);

Route::get('/', function () {
    return response()->json(
        ['message' => 'OK - atualizado']
    );
});
