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

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'dean']);
        $role1->givePermissionTo('create other users');
        $role1->givePermissionTo('read other users');
        $role1->givePermissionTo('delete other users');
        $role1->givePermissionTo('update other users');

        $role2 = Role::create(['name' => 'lecturer']);
        $role2->givePermissionTo('create other users');
        $role2->givePermissionTo('read other users');
        $role2->givePermissionTo('delete other users');
        $role2->givePermissionTo('update other users');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role4 = Role::create(['name' => 'administrator']);
        $role4->givePermissionTo('read other users');
        $role4->givePermissionTo('delete other users');
        $role4->givePermissionTo('update other users');

        $role2 = Role::create(['name' => 'coordinator']);
        $role2->givePermissionTo('read other users');

        $role2 = Role::create(['name' => 'student']);

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
