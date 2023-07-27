<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::paginate(15)->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);
        return Inertia::render('backend/users/Index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('backend/users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_user = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:5|max:255',
            'password' => 'required|confirmed'
        ]);

        $new_user['password'] = bcrypt($new_user['password']);

        User::create($new_user);

        $users = User::paginate(15)->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);

        return Inertia::render('backend/users/Index', ['users' => $users]);
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
