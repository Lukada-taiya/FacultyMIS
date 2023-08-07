<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        if (auth()->user()->hasPermissionTo('read other users')) {
            $users = User::latest()->paginate(15)->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->roles->first()->name ?? null
            ]);
            return Inertia::render('backend/users/Index', ['users' => $users]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('create other users')) {
            $roles = Role::all()->where('name', '<>', 'dean')->where('name', '<>', 'super-admin')->map(fn ($role) => [
                'id' => $role->id,
                'name' => $role->name
            ]);
            return Inertia::render('backend/users/Create', ['roles' => $roles]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('create other users')) {
            $new_user = $request->validate([
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users,email|min:5|max:255',
                'password' => 'required|confirmed|min:8',
                'role' => 'required'
            ]);

            $new_user['password'] = bcrypt($new_user['password']);

            $user = User::create($new_user);
            $user->assignRole($new_user['role']);
            return to_route('users.index');
        } else {
            abort(403, 'Unauthorized action.');
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
        if (auth()->user()->hasPermissionTo('update other users')) {
            $user = User::findOrFail($id);
            $user = [
                'id' => $user->id, 'name' => $user->name, 'email' => $user->email,
                'role' => $user->roles->first()->id
            ];
            $roles = Role::all()->where('name', '<>', 'dean')->where('name', '<>', 'super-admin')->map(fn ($role) => [
                'id' => $role->id,
                'name' => $role->name
            ]);
            return Inertia::render('backend/users/Edit', ['user' => $user, 'roles' => $roles]);
        } else {
            abort(403, 'Unauthorized action');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->hasPermissionTo('update other users')) {
            $request->validate([
                'name' => 'required|min:3|max:255',
                'email' => 'required|min:5|max:255',
                'password' => 'nullable|confirmed|min:8',
                'role' => 'required'
            ]);
            $user = User::findOrFail($id);
            $user['name'] = $request->input('name');
            $user['email'] = $request->input('email');
            if ($request->input('password') != null) {
                $user['password'] = bcrypt($request->input('password'));
            }
            $current_role = $user->roles->first();
            $user->removeRole($current_role);
            $user->assignRole($request->input('role'));
            $user->save();
            return Redirect::route('users.index');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
