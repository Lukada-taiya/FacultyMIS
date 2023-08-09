<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Programme;
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

            $levels = Level::all()->map(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name
            ]);

            $programmes = Programme::all()->map(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name
            ]);

            $department = Department::all()->map(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name
            ]);
            return Inertia::render('backend/users/Create', ['roles' => $roles, 'levels' => $levels, 'programmes' => $programmes, 'departments' => $department]);
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
                'role' => 'required',
                'programme' => 'exclude_unless:role,7|required',
                'level' => 'exclude_unless:role,7|required',
                'department' => 'exclude_unless:role,3|required'
            ]);
            $new_user['password'] = bcrypt($new_user['password']);
            $user = User::create([
                'name' => $new_user['name'],
                'email' => $new_user['email'],
                'password' => $new_user['password'],
            ]);

            $user->assignRole($new_user['role']);

            if ($new_user['role'] == 7) {
                $user->level_id = $new_user['level'];
                $user->programme_id = $new_user['programme'];
                $user->save();
            } else if ($new_user['role'] == 3) {
                $user->department_id = $new_user['department'];
                $user->save();
            }

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
                'role' => $user->roles->first()->id ?? "",
                'level' => $user->level->id ?? "",
                'department' => $user->department->id ?? "",
                'programme' => $user->programme->id ?? ""
            ];
            $roles = Role::all()->where('name', '<>', 'dean')->where('name', '<>', 'super-admin')->map(fn ($role) => [
                'id' => $role->id,
                'name' => $role->name
            ]);

            $levels = Level::all()->map(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name
            ]);

            $programmes = Programme::all()->map(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name
            ]);

            $department = Department::all()->map(fn ($level) => [
                'id' => $level->id,
                'name' => $level->name
            ]);
            return Inertia::render('backend/users/Edit', ['user' => $user, 'roles' => $roles, 'levels' => $levels, 'programmes' => $programmes, 'departments' => $department]);
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
                'role' => 'required',
                'programme' => 'exclude_unless:role,7|required',
                'level' => 'exclude_unless:role,7|required',
                'department' => 'exclude_unless:role,3|required'
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
            if ($request->input('role') == 7) {
                $user->level_id = $request->input('level');
                $user->programme_id = $request->input('programme');
                $user->department_id = null;
            } else if ($request->input('role') == 3) {
                $user->department_id = $request->input('department');
                $user->level_id = null;
                $user->programme_id = null;
            } else {
                $user->department_id = null;
                $user->level_id = null;
                $user->programme_id = null;
            }
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
