<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
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

        // Ensure the end date is after the start date
        $start_date = Carbon::parse($this->faker->date());
        $end_date   = Carbon::instance($start_date)->addMonth(random_int(1, 12));

        return [
            'description'      => $this->faker->sentence(),
            'status'           => 'new',
            'start_date'       => $start_date,
            'end_date'         => $end_date,
            'next_review_date' => null,
            'user_id'          => User::factory(),

        ];
    }
}
