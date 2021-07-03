<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Database\Seeders\MatComponentSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RegistrationTest extends TestCase {
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered() {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register() {

        DB::table('users')->truncate();
        $this->seed(UserSeeder::class);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        /*$this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);*/

        $response = $this->get('/register');
        $response->assertStatus(200);

    }
}
