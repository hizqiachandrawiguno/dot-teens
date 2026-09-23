<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VolunteerLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_volunteer_can_login_with_default_credentials(): void
    {
        // Login dengan default volunteer credentials
        $response = $this->post('/login', [
            'email' => 'volunteer@dotteens.com',
            'password' => 'volunteer123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();

        $user = auth()->user();
        $this->assertEquals('volunteer@dotteens.com', $user->email);
        $this->assertEquals('volunteer', $user->role);
        $this->assertEquals('approved', $user->status);
    }

    public function test_setup_volunteer_route_works(): void
    {
        $response = $this->get('/setup-volunteer');
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'email' => 'volunteer@dotteens.com',
            'role' => 'volunteer',
            'status' => 'approved',
        ]);
    }
}
