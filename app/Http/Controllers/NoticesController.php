<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NoticesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:manage notices']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('manage notices')) {
        $notices = Notice::latest()->paginate(10)->through(fn ($notice) => [
            'id' => $notice->id,
            'title' => $notice->title,
            'from' => $notice->from,
            'body' => $notice->body,
            'date' => $notice->created_at->diffforHumans()
        ]);
        // dd($notices);
        return Inertia::render('backend/notices/Index', ['notices' => $notices]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('backend/notices/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'title' => 'required|min:3|max:255',
            'from' => 'required:min:3|max:255',
            'body' => 'required:min:3'
        ]);

        Notice::create($result);
        return Redirect::route('requests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
