<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course_Programme>
 */
class Course_ProgrammeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ["degree", "diploma"];
        $index = array_rand($types);
        return [
            'course_id' => $this->faker->numberBetween(1,10),
            'programme_id' => $this->faker->numberBetween(1,10),
            'type' => $types[$index]
        ];
    }
}
