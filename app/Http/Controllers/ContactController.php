<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:read contacts']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user()->hasRole('re'))
        if (auth()->user()->can('read contacts')) {
            $contacts = Contact::latest()->paginate(10)->through(fn ($contact) => [
                'id' => $contact->id,
                'email' => $contact->email,
                'message' => $contact->message
            ]);
            return Inertia::render('backend/contacts/Index', ['contacts' => $contacts]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (auth()->user()->can('read contacts')) {
            $contact = Contact::findOrFail($request->id);
            return Inertia::render('backend/contacts/Create', ['email' => $contact->email]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
