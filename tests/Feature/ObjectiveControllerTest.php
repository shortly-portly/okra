<?php

namespace Tests\Feature;

use App\Models\Objective;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ObjectiveControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_objective_controller_index()
    {
//        $user = User::factory()->create();

        $response = $this->actingAs($this->user)
            ->get('/objective');

        $response->assertStatus(200);
        $response->assertSee('Objective List');
    }

    public function test_objective_controller_show()
    {
        $user = User::factory()
            ->has(Objective::factory(12))
            ->create();

        $response = $this->actingAs($user)
            ->get('/objective');

        $response->assertStatus(200);
        $response->assertSee($user->objectives[0]->description);
        $response->assertDontSee($user->objectives[11]->description);

    }

    public function test_can_create_an_objective()
    {
        $response = $this->post_objective();

        $response->assertStatus(302);
        $this->assertDatabaseHas('objectives', [
            'description' => 'My First Objective',
        ]);

        $response->assertRedirectContains('objective');
    }

    public function test_description_is_mandatory()
    {
        $response = $this->post_objective([
            'description' => null,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'description' => 'The description field is required.',
        ]);
    }

    public function test_description_length_is_greater_than_two_characters()
    {
        $response = $this->post_objective([
            'description' => 'a',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'description' => 'The description must be at least 2 characters.',
        ]);
    }

    public function test_start_date_is_mandatory()
    {
        $response = $this->post_objective([
            'start_date' => null,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'start_date' => 'The start date field is required.',
        ]);
    }

    public function test_start_date_must_be_a_date()
    {
        $response = $this->post_objective([
            'start_date' => 'Wibble',
        ]);

        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'start_date' => 'The start date is not a valid date.',
        ]);
    }

    public function test_start_date_must_be_a_valid_date()
    {
        $response = $this->post_objective([
            'start_date' => '2022-55-55',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'start_date' => 'The start date is not a valid date.',
        ]);
    }

    public function test_end_date_is_mandatory()
    {
        $response = $this->post_objective([
            'end_date' => null,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'end_date' => 'The end date field is required.',
        ]);
    }

    public function test_end_date_must_be_a_date()
    {
        $response = $this->post_objective([
            'end_date' => 'Wibble',
        ]);

        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'end_date' => 'The end date is not a valid date.',
        ]);
    }

    public function test_end_date_must_be_a_valid_date()
    {
        $response = $this->post_objective([
            'end_date' => '2022-55-55',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'end_date' => 'The end date is not a valid date.',
        ]);
    }

    public function test_next_review_date_must_be_a_date()
    {
        $response = $this->post_objective([
            'next_review_date' => 'Wibble',
        ]);

        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'next_review_date' => 'The next review date is not a valid date.',
        ]);
    }

    public function test_next_review_date_must_be_a_valid_date()
    {
        $response = $this->post_objective([
            'next_review_date' => '2022-55-55',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'next_review_date' => 'The next review date is not a valid date.',
        ]);
    }

    public function test_next_review_date_must_be_after_start_date()
    {
        $response = $this->post_objective([
            'start_date'       => '2022-05-12',
            'next_review_date' => '2021-12-23',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'next_review_date' => 'The next review date must be a date after start date.',
        ]);
    }

    public function test_next_review_date_must_be_before_end_date()
    {
        $response = $this->post_objective([
            'end_date'         => '2022-05-12',
            'next_review_date' => '2022-12-23',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'next_review_date' => 'The next review date must be a date before end date.',
        ]);
    }

    protected function post_objective($attributes = [])
    {
        $attributes = array_merge([
            'description' => 'My First Objective',
            'start_date'  => '2022-01-01',
            'end_date'    => '2022-02-02'],
            $attributes);

        return $this->actingAs($this->user)
            ->post('/objective', $attributes);
    }
}
