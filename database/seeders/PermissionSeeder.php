<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create other users']);
        Permission::create(['name' => 'update other users']);
        Permission::create(['name' => 'delete other users']);
        Permission::create(['name' => 'read other users']);

        Permission::create(['name' => 'create subordinate']);
        Permission::create(['name' => 'update subordinate']);
        Permission::create(['name' => 'delete subordinate']);
        Permission::create(['name' => 'read subordinate']);
 
        Permission::create(['name' => 'update own profile']);
        Permission::create(['name' => 'read own profile']);

        Permission::create(['name' => 'create requests']);
        Permission::create(['name' => 'update requests']);
        Permission::create(['name' => 'delete requests']);
        Permission::create(['name' => 'read requests']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'dean']);
        $role1->givePermissionTo('create other users');
        $role1->givePermissionTo('read other users');
        $role1->givePermissionTo('delete other users');
        $role1->givePermissionTo('update other users');
        $role1->givePermissionTo('create requests');
        $role1->givePermissionTo('read requests');
        $role1->givePermissionTo('delete requests');
        $role1->givePermissionTo('update requests'); 
        $role1->givePermissionTo('read own profile');
        $role1->givePermissionTo('update own profile');
        $role1->givePermissionTo('create subordinate');
        $role1->givePermissionTo('read subordinate');
        $role1->givePermissionTo('delete subordinate');
        $role1->givePermissionTo('update subordinate');

        $role4 = Role::create(['name' => 'administrator']);
        $role4->givePermissionTo('read other users');
        $role4->givePermissionTo('delete other users');
        $role4->givePermissionTo('update other users');
        $role4->givePermissionTo('create requests');
        $role4->givePermissionTo('read requests');
        $role4->givePermissionTo('delete requests');
        $role4->givePermissionTo('update requests'); 
        $role4->givePermissionTo('read own profile');
        $role4->givePermissionTo('update own profile');
        $role4->givePermissionTo('create subordinate');
        $role4->givePermissionTo('read subordinate');
        $role4->givePermissionTo('delete subordinate');
        $role4->givePermissionTo('update subordinate');

        $role5 = Role::create(['name' => 'hod']);
        $role5->givePermissionTo('read other users');
        $role5->givePermissionTo('read subordinate');
        $role5->givePermissionTo('update subordinate'); 
        $role5->givePermissionTo('read own profile');
        $role5->givePermissionTo('update own profile');
        $role5->givePermissionTo('create requests');
        $role5->givePermissionTo('read requests');
        $role5->givePermissionTo('delete requests');
        $role5->givePermissionTo('update requests');

        $role6 = Role::create(['name' => 'coordinator']);
        $role6->givePermissionTo('read other users'); 
        $role6->givePermissionTo('read own profile');
        $role6->givePermissionTo('update own profile');
        $role6->givePermissionTo('create requests');
        $role6->givePermissionTo('read requests');
        $role6->givePermissionTo('delete requests');
        $role6->givePermissionTo('update requests');
        $role6->givePermissionTo('read subordinate');
        $role6->givePermissionTo('update subordinate');

        $role2 = Role::create(['name' => 'lecturer']);
        $role2->givePermissionTo('read other users');
        $role2->givePermissionTo('create requests');
        $role2->givePermissionTo('read requests');
        $role2->givePermissionTo('delete requests');
        $role2->givePermissionTo('update requests'); 
        $role2->givePermissionTo('read own profile');
        $role2->givePermissionTo('update own profile');

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo(Permission::all());
        // gets all permissions via Gate::before rule; see AuthServiceProvider        

        $role7 = Role::create(['name' => 'student']);
        $role7->givePermissionTo('read other users'); 
        $role7->givePermissionTo('read own profile');
        $role7->givePermissionTo('create requests');
        $role7->givePermissionTo('read requests');
        $role7->givePermissionTo('delete requests');
        $role7->givePermissionTo('update requests');

        $role8 = Role::create(['name' => 'guest']);
        $role8->givePermissionTo('create requests');
        $role8->givePermissionTo('read requests');
        $role8->givePermissionTo('delete requests');
        $role8->givePermissionTo('update requests');
        $role7->givePermissionTo('read own profile');
        $role7->givePermissionTo('update own profile');

        $users = \App\Models\User::factory(10)->create();

        // dd($users);
        // foreach($users as $user) {
        //     $user->assignRole(7);
        // }

        // create demo users
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example User',
        //     'email' => 'test@example.com',
        // ]);
        // $user->assignRole($role1);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        // ]);
        // $user->assignRole($role2);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Super-Admin User',
        //     'email' => 'superadmin@example.com',
        // ]);
        // $user->assignRole($role3);
    }
}
