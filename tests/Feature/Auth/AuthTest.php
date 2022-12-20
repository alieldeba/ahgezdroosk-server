<?php

namespace Tests\Feature\Auth;

use App\Models\Grade;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_register()
    {
        $grade = Grade::factory()->create();
        $response = $this->postJson('/api/auth/register', [
            ...$user = User::factory()->definition(),
            ...Profile::factory()->definition(),
            'phone' => '01544875424',
            'grade_id' => $grade->id,
            'password' => 123456789,
            'password_confirmation' => 123456789,
        ]);
        $response->assertCreated();
        $response->assertJsonStructure([
            'message',
            'token'
        ]);
    }

    public function test_can_login()
    {
        $user = User::factory()->create();
        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'token',
            'message'
        ]);
        $this->assertTrue($user->tokens->count() > 0);
    }

    public function test_cannot_login_with_invalid_data()
    {
        $user = User::factory()->create();
        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'pas1sword'
        ]);
        $response->assertUnauthorized();
    }

    public function test_can_get_user()
    {
        $this->actingAs($user = User::factory()->create());
        $profile = Profile::factory()->create([
            'user_id' => $user
        ]);
        $response = $this->getJson('/api/auth/user');

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'user',
        ]);

        $response->assertJsonFragment(
            $user->with('profile')->get()->toArray()
        );
    }
}
