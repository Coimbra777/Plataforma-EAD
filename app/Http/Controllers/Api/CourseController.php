<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;

class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseService->getCourses();

        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCourseRequest $request)
    {
        $course = $this->courseService->createNewCourse($request->validated());

        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identify)
    {
        $course = $this->courseService->getCourse($identify);

        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     * @param StoreUpdateCourseRequest $request
     * @param string $identify
     * @return CourseResource
     */
    public function update(StoreUpdateCourseRequest $request, string $identify)
    {
        $this->courseService->updateCourse($identify, $request->validated());

        return response()->json(['message' => 'Curso atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identify)
    {
        $this->courseService->deleteCourse($identify);

        return response()->json([], 204);
    }
}
