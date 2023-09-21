<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;

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
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'read users']);

        Permission::create(['name' => 'manage contacts']);
        Permission::create(['name' => 'manage notices']);
        // Permission::create(['name' => 'delete subordinate']);
        // Permission::create(['name' => 'read subordinate']);

        Permission::create(['name' => 'update own profile']);
        Permission::create(['name' => 'read own profile']);

        Permission::create(['name' => 'create requests']);
        Permission::create(['name' => 'update requests']);
        Permission::create(['name' => 'read requests']);

        Permission::create(['name' => 'create programmes']);
        Permission::create(['name' => 'update programmes']);
        Permission::create(['name' => 'delete programmes']);
        Permission::create(['name' => 'read programmes']);

        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'update courses']);
        Permission::create(['name' => 'delete courses']);
        Permission::create(['name' => 'read courses']);
        
        Permission::create(['name' => 'create others courses']);
                Permission::create(['name' => 'update others courses']);
                Permission::create(['name' => 'delete others courses']);
                Permission::create(['name' => 'read others courses']);

        Permission::create(['name' => 'create departments']);
        Permission::create(['name' => 'update departments']);
        Permission::create(['name' => 'delete departments']);
        Permission::create(['name' => 'read departments']);
        
        Permission::create(['name' => 'create others programmes']);
        Permission::create(['name' => 'update others programmes']);
        Permission::create(['name' => 'delete others programmes']);
        Permission::create(['name' => 'read others programmes']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'super-admin']);
        $role1->givePermissionTo(Permission::all());
        // gets all permissions via Gate::before rule; see AuthServiceProvider      

        $role2 = Role::create(['name' => 'dean']);
        $role2->givePermissionTo([
            'manage notices',
            'read own profile', 'update own profile',
            'create users', 'read users', 'update users', 'delete users',
            'create requests', 'read requests', 'update requests',
            'create courses', 'read courses', 'update courses', 'delete courses',
            'create departments', 'read departments', 'update departments', 'delete departments',
            'create programmes', 'read programmes', 'update programmes', 'delete programmes',
             'create others courses', 'read others courses', 'update others courses', 'delete others courses',
                        'read others programmes', 'create others programmes', 'update others programmes', 'delete others programmes'
                        'read others programmes', 'create programmes', 'update programmes', 'delete programmes'
        ]);

        $role3 = Role::create(['name' => 'administrator']);
        $role3->givePermissionTo([
            'manage notices',
            'manage contacts',
            'read own profile', 'update own profile',
            'create users', 'read users', 'update users',
            'create requests', 'read requests', 'update requests',
            'create courses', 'read courses', 'update courses', 'delete courses',
            'create departments', 'read departments', 'update departments', 'delete departments',
            'create programmes', 'read programmes', 'update programmes', 'delete programmes',
             'create others courses', 'read others courses', 'update others courses', 'delete others courses',
                        'read others programmes', 'create others programmes', 'update others programmes', 'delete others programmes'
                        'read others programmes', 'create programmes', 'update programmes', 'delete programmes'
        ]);

        $role4 = Role::create(['name' => 'hod']);
        $role4->givePermissionTo([
            'manage notices',
            'read own profile', 'update own profile',
            'create requests', 'read requests', 'update requests',
            'create courses', 'read courses', 'update courses', 'delete courses',
            'create programmes', 'read programmes', 'update programmes', 'delete programmes',
        ]);

        $role5 = Role::create(['name' => 'coordinator']);
        $role5->givePermissionTo([
            'manage notices',
            'read own profile', 'update own profile',
            'create requests', 'read requests', 'update requests',
            'read courses', 'create courses', 'update courses', 'delete courses',
            'create programmes', 'read programmes', 'update programmes', 'delete programmes',
        ]);

        $role6 = Role::create(['name' => 'lecturer']);
        $role6->givePermissionTo([
            'manage notices',
            'read own profile', 'update own profile',
            'create requests', 'read requests', 'update requests',
        ]);


        $role7 = Role::create(['name' => 'student']);
        $role7->givePermissionTo([
            'read own profile', 'update own profile',
            'create requests', 'read requests', 'update requests',
        ]);

        $role8 = Role::create(['name' => 'guest']);
        $role8->givePermissionTo([
            'read own profile', 'update own profile',
            'create requests', 'read requests', 'update requests'
        ]);

        // $users = \App\Models\User::factory(10)->create();

        // dd($users);
        // foreach($users as $user) {
        //     $user->assignRole(7);
        // }

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Dean User',
            'email' => 'dean@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Administrator User',
            'email' => 'administrator@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Hod User',
            'email' => 'hod@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'Coordinator User',
            'email' => 'coordinator@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role5);

        $user = \App\Models\User::factory()->create([
            'name' => 'Lecturer User',
            'email' => 'lecturer@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role6);

        $user = \App\Models\User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role7);

        $user = \App\Models\User::factory()->create([
            'name' => 'Guest User',
            'email' => 'guest@cktutas.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user->assignRole($role8);
    }
}
