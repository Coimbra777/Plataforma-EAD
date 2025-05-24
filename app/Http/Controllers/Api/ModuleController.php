<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModuleRequest;
use App\Http\Resources\ModuleResource;
use App\Services\ModuleService;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
        $courses = $this->moduleService->getModulesByCourse($course);

        return ModuleResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreUpdateModuleRequest $request, $courseIdentify)
    {
        $data = $request->validated();

        $module = $this->moduleService->createNewModule($data, $courseIdentify);

        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     * @param string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($course, string $identify)
    {
        $module = $this->moduleService->getModuleByCourse($course, $identify);

        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     * @param StoreUpdateCourseRequest $request
     * @param string $identify
     * @return ModuleService
     */
    public function update(StoreUpdateModuleRequest $request, string $courseIdentify, string $identify)
    {
        $this->moduleService->updateModuleByCourse($courseIdentify, $identify, $request->validated());

        return response()->json(['message' => 'Módulo atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $courseIdentify, string $identify)
    {
        $this->moduleService->deleteModule($courseIdentify, $identify);

        return response()->json([], 204);
    }
}
