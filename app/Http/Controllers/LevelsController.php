<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LevelsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:read levels|update levels| create levels | delete levels']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('read levels')) {
            $levels = Level::latest()->paginate(10)->through(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name,
            ]);
            return Inertia::render('backend/levels/Index', ['levels' => $levels]);
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
        if (auth()->user()->can('create levels')) {
            $level = $request->validate([
                'name' => 'required|min:3',
            ]);

            Level::create($level);
            return Redirect::route('levels.index');
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
