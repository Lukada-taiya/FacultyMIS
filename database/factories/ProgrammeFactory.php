<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programme>
 */
class ProgrammeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ["degree", "diploma"];
        $key = array_rand($type);
        return [
            'name' => $this->faker->word(),
            'type' => $type[$key],
            'department_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
