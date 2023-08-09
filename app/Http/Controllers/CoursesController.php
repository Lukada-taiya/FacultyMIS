<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Programme;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10)->through(fn ($course) => [
            'id' => $course->id,
            'name' => $course->name,
            'code' => $course->code
        ]);
        $semesters = Semester::all()->map(fn ($semester) => [
            'id' => $semester->id,
            'name' => $semester->name
        ]);
        $programmes = Programme::all()->map(fn ($programme) => [
            'id' => $programme->id,
            'name' => $programme->name
        ]);
        $lecturers = User::role('lecturer')->get()->map(fn ($lecturer) => [
            'id' => $lecturer->id,
            'name' => $lecturer->name
        ]);
        return Inertia::render('backend/courses/Index', ['courses' => $courses, 'semesters' => $semesters, 'programmes' => $programmes, 'lecturers' => $lecturers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = $request->validate([
            'name' => 'required|min:3',
            'code' => 'required|min:3|unique:courses,code',
            'semester' => 'required',
            'lecturer' => 'required',  
        ]);
        $programmes = $request->addedPrograms;
        $new_rel = [];
        foreach($programmes as $program) { 
            $new_rel[$program['programme']] = ['type' => $program['type']]; 
        }    
        $new_course = Course::create($course);
        $new_course->lecturer_id = $course['lecturer'];
        $new_course->semester_id = $course['semester'];
        $new_course->programmes()->sync($new_rel);
        return Redirect::route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
