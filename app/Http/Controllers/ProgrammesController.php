<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProgrammesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'permission:read programmes|update programmes| create programmes | delete programmes']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('read programmes')) {
            $programmes = Programme::latest()->paginate(10)->through(fn ($programme) => [
                'id' => $programme->id,
                'name' => $programme->name,
                'type' => $programme->type,
                'department' => $programme->department->id
            ]);
            // dd($programmes[0]->department);
            $departments = Department::all()->map(fn ($department) => [
                'id' => $department->id,
                'name' => $department->name
            ]);
            return Inertia::render('backend/programmes/Index', ['programmes' => $programmes, 'departments' => $departments]);
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
        if (auth()->user()->can('create programmes')) {
            $programme = $request->validate([
                'name' => 'required|min:3',
                'type' => 'required',
                'department_id' => 'required'
            ]);

            $programme = Programme::create($programme);
            // $programme->
            return Redirect::route('programmes.index');
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
