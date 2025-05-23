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
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($course)
    {
        $courses = $this->moduleService->getModulesByCourse($course);

        return ModuleResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(StoreUpdateModuleRequest $request, $course)
    {
        $module = $this->moduleService->createNewModule($request->validated());

        return new ModuleService($module);
    }

    /**
     * Display the specified resource.
     */
    public function show($course, string $identify)
    {
        $course = $this->moduleService->getModuleByCourse($course, $identify);

        return new ModuleService($course);
    }

    /**
     * Update the specified resource in storage.
     * @param StoreUpdateCourseRequest $request
     * @param string $uuid
     * @return ModuleService
     */
    public function update(StoreUpdateModuleRequest $request, $course, string $uuid)
    {
        $this->moduleService->updateModuleByCourse($uuid, $request->validated());

        return response()->json(['message' => 'Curso atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $this->moduleService->deleteModule($uuid);

        return response()->json([], 204);
    }
}
