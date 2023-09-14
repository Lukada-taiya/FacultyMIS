<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SemestersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:read semesters|update semesters| create semesters | delete semesters']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('read semesters')) {
        $semesters = Semester::latest()->paginate(10)->through(fn ($semester) => [
            'id' => $semester->id,
            'name' => $semester->name,
        ]);
        return Inertia::render('backend/semesters/Index', ['semesters' => $semesters]);
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
    if (auth()->user()->can('create semesters')) {
        $semester = $request->validate([
            'name' => 'required|min:3',
        ]);

        Semester::create($semester);
        return Redirect::route('semesters.index');
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
