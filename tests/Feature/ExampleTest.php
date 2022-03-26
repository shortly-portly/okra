<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/objective');

        $response->assertStatus(302);
        $response->assertLocation('/login');
    }

    public function test_logging_on()
    {
        $response = $this->post('/login');
        $response->assertSessionHasErrors([
            'password' => 'The password field is required.',
            'email'    => 'The email field is required.',
        ]);
    }

    public function test_successful_logon()
    {
        $user = User::factory()->create(['password' => 'password']);

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertLocation('/objective');

    }
    public function test_already_logged_on()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/objective');

        $response->assertStatus(200);
        $response->assertSee('Objective List');
    }
}
