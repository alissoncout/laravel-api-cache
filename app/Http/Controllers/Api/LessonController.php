<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Http\Resources\LessonResource;
use App\Services\LessonService;

class LessonController extends Controller
{
    private $service;

    public function __construct (LessonService $service){
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module_identify)
    {
        $modules = $this->service->getLessonsByModule($module_identify);

        return LessonResource::collection($modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLesson $request)
    {
        $module = $this->service->createNewLesson($request->validated());

        return new LessonResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($module_identify, $identify)
    {
        $module = $this->service->getLessonByModule($module_identify, $identify);

        return new LessonResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLesson $request, $lesson_identify, $identify)
    {
        $this->service->updateLesson($identify, $request->validated());

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($lesson_identify, $identify)
    {
        $module = $this->service->deleteLesson($identify);

        return response()->json([], 204);
    }
}
