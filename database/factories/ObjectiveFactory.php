<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objective>
 */
class ObjectiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'      => $this->faker->sentence(),
            'status'           => 'new',
            'start_date'       => $this->faker->date(),
            'end_date'         => $this->faker->date(),
            'next_review_date' => $this->faker->date(),
            'user_id'          => User::factory(),

        ];
    }
}
