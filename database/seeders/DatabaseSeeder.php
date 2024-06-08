<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Course_Programme;
use App\Models\Department;
use App\Models\Level;
use App\Models\Programme;
use App\Models\Semester;
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
        // \App\Models\Team::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Seed Semeters
        Semester::factory()->create([
            'name' => 'First',
        ]);

        Semester::factory()->create([
            'name' => 'Second',
        ]);

        //Seed Levels
        Level::factory()->create([
            'name' => '100',
        ]);

        Level::factory()->create([
            'name' => '200',
        ]);

        Level::factory()->create([
            'name' => '300',
            ]);

            Level::factory()->create([
                'name' => '400',
        ]);

        Level::factory()->create([
            'name' => '500',
        ]);

        Level::factory()->create([
            'name' => '600',
        ]);

        Level::factory()->create([
            'name' => '700',
            ]);

        //Seed Departments
        Department::factory(10)->create();

        //Seed Programmes
        Programme::factory(10)->create();

        //Seed Roles, Permissions and Users
        $this->call(PermissionSeeder::class);

        //Seed Courses
        Course::factory(10)->create();

        //Seed Course_Programme Relationship
        Course_Programme::factory()->create([
            'course_id' => 1,
            'programme_id' => rand(1,10),
            'type' => 'degree'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 2,
            'programme_id' => rand(1,10),
            'type' => 'diploma'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 3,
            'programme_id' => rand(1,10),
            'type' => 'degree'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 4,
            'programme_id' => rand(1,10),
            'type' => 'diploma'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 5,
            'programme_id' => rand(1,10),
            'type' => 'degree'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 6,
            'programme_id' => rand(1,10),
            'type' => 'diploma'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 7,
            'programme_id' => rand(1,10),
            'type' => 'degree'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 8,
            'programme_id' => rand(1,10),
            'type' => 'diploma'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 9,
            'programme_id' => rand(1,10),
            'type' => 'degree'
        ]);
        Course_Programme::factory()->create([
            'course_id' => 10,
            'programme_id' => rand(1,10),
            'type' => 'diploma'
        ]);
    }
    }
