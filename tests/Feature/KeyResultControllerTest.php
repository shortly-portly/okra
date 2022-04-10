<?php

namespace Tests\Feature;

use App\Models\KeyResult;
use App\Models\Objective;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KeyResultControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user      = User::factory()->create();
        $this->objective = Objective::factory()->create([
            'start_date' => '2020-01-01',
            'end_date'   => '2023-01-01',
            'user_id'    => $this->user->id
        ]);
    }

    public function test_can_create_key_results()
    {
        $this->post_key_result($this->objective);

        $this->assertDatabaseHas('key_results', [
            'description' => 'My First Key Result',
        ]);
    }

    public function test_can_view_key_result()
    {

        $this->post_key_result($this->objective);

        $response = $this->actingAs($this->user)->get('/objective/' . $this->objective->id);

        $response->assertSee('My First Key Result');

    }

    public function test_description_is_mandatory()
    {

        $response = $this->post_key_result($this->objective, [
            'description' => null,
        ]);

        $response->assertSessionHasErrors([
            'description' => 'The description field is required.',
        ]);
    }

    public function test_start_date_is_mandatory()
    {

        $response = $this->post_key_result($this->objective, [
            'start_date' => null,
        ]);

        $response->assertSessionHasErrors([
            'start_date' => 'The start date field is required.',
        ]);
    }

    public function test_start_date_must_be_a_date()
    {
        $response = $this->post_key_result($this->objective, [
            'start_date' => 'Wibble',
        ]);

        $response->assertSessionHasErrors([
            'start_date' => 'The start date is not a valid date.',
        ]);
    }

    public function test_start_date_must_be_after_objective_start_date()
    {
        $response = $this->post_key_result($this->objective, [
            'start_date' => '1999-10-21',
        ]);

        $response->assertSessionHasErrors([
            'start_date' => 'The start date must be after the objective start date (01/01/2020)',
        ]);
    }

    public function test_end_date_is_mandatory()
    {

        $response = $this->post_key_result($this->objective, [
            'end_date' => null,
        ]);

        $response->assertSessionHasErrors([
            'end_date' => 'The end date field is required.',
        ]);
    }

    public function test_end_date_must_be_a_date()
    {
        $response = $this->post_key_result($this->objective, [
            'end_date' => 'Wibble',
        ]);

        $response->assertSessionHasErrors([
            'end_date' => 'The end date is not a valid date.',
        ]);
    }

    public function test_end_date_must_be_after_start_date()
    {
        $response = $this->post_key_result($this->objective, [
            'start_date' => '2022-12-23',
            'end_date'   => '2022-11-11',
        ]);

        $response->assertSessionHasErrors([
            'end_date' => 'The end date must be a date after start date.',
        ]);
    }

    public function test_end_date_must_be_before_objective_end_date()
    {
        $response = $this->post_key_result($this->objective, [
            'end_date' => '2025-10-21',
        ]);

        $response->assertSessionHasErrors([
            'end_date' => 'The end date must be before the objective end date (01/01/2023)',
        ]);
    }

    protected function post_key_result(Objective $objective, $attributes = [])
    {

        $attributes = array_merge(array(
            'description'  => 'My First Key Result',
            'status'       => 'New',
            'start_date'   => '2022-02-02',
            'end_date'     => '2022-03-01',
            'objective_id' => $objective->id,
        ), $attributes);

        return $this->actingAs($this->user)->post('/objective/' . $objective->id . '/keyResult', $attributes);
    }

}
