<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word();
        return [
            'name' => $name,
            'code' => substr($name,0,3). ' '. $this->faker->numberBetween(100, 799),
            'lecturer_id' => rand(4,6),
            'semester_id' => $this->faker->numberBetween(1,2),
            'level_id' => $this->faker->numberBetween(1,4)
        ];
    }
}
