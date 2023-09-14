<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
 
        // $faker = Factory::create();
        // for ($i = 0; $i < 10; $i++) {
        //     $user =
        //         \App\Models\User::factory()->create();
        //     $user->assignRole($faker->randomDigitNotNull());
        // }
        // \App\Models\User::factory(10)->assignRole()->create();
        $this->call(PermissionSeeder::class);
        // \App\Models\Team::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Semester::factory()->create([
            'name' => 'First', 
        ]);

        \App\Models\Semester::factory()->create([
            'name' => 'Second',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '100',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '200',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '300',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '400',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '500',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '600',
        ]);

        \App\Models\Level::factory()->create([
            'name' => '700',
        ]);

    }
}
