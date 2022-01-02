<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Http\Resources\ModuleResource;
use App\Services\ModuleService;

class ModuleController extends Controller
{
    private $service;

    public function __construct (ModuleService $service){
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_identify)
    {
        $modules = $this->service->getModulesByCourse($course_identify);

        return ModuleResource::collection($modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateModule $request)
    {
        $module = $this->service->createNewModule($request->validated());

        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($course_identify, $identify)
    {
        $module = $this->service->getModuleByCourse($course_identify, $identify);

        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateModule $request, $course_identify, $identify)
    {
        $this->service->updateModule($identify, $request->validated());

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_identify, $identify)
    {
        $module = $this->service->deleteModule($identify);

        return response()->json([], 204);
    }
}
