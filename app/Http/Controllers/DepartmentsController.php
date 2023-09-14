<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:read departments|update departments| create departments | delete departments']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('read departments')) {
            $departments = Department::latest()->paginate(10)->through(fn ($department) => [
                'id' => $department->id,
                'name' => $department->name,
            ]);
            return Inertia::render('backend/departments/Index', ['departments' => $departments]);
        } else {
            abort(403, 'Unauthorized Action');
        }
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
        if (auth()->user()->can('create departments')) {
            $department = $request->validate([
                'name' => 'required|min:3',
            ]);

            Department::create($department);
            return Redirect::route('departments.index');
        } else {
            abort(403, 'Unauthorized Action');
        }
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
