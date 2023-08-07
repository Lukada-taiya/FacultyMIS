<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

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
        $roles = Role::all()->where('name', '<>', 'dean')->where('name', '<>', 'super-admin')->map(fn ($role) => [
            'id' => $role->id,
            'name' => $role->name
        ]);
        return Inertia::render('backend/users/Create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd(auth()->user()->hasPermissionTo('create other users'));
        if (auth()->user()->hasPermissionTo('create other users')) {
            $new_user = $request->validate([
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users,email|min:5|max:255',
                'password' => 'required|confirmed',
                'role' => 'required'
            ]);

            $new_user['password'] = bcrypt($new_user['password']);

            $user = User::create($new_user);
            $user->assignRole($new_user['role']);
            dd($user->hasRole('hod'));
        }

        return to_route('users.index');
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
