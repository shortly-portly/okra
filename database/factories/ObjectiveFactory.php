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
            'start_date'       => $this->faker->date('d/m/Y'),
            'end_date'         => $this->faker->date('d/m/Y'),
            'next_review_date' => null,
            'user_id'          => User::factory(),

        ];
    }
}
