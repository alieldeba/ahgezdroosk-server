<?php

namespace Tests\Feature;

use App\Models\Grade;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    private Profile $profile;
    protected function setUp(): void
    {
        parent::setUp();

        $this->profile = Profile::factory()->create();
    }

    public function test_get_profile_as_guest()
    {
        $this
            ->getJson('/api/users/profiles/' . $this->profile->id)
            ->assertSuccessful()
            ->assertJsonStructure([
                'id',
                'name',
                'grade' => [
                    'id',
                    'name'
                ],
                'user' => [
                    'id',
                    'username'
                ],
                'avatar'
            ]);
    }

    public function test_get_profile_as_profile_owner()
    {

        $this
            ->actingAs($this->profile->user)
            ->getJson('/api/users/profiles/' . $this->profile->id)
            ->assertSuccessful()
            ->assertJsonStructure([
                'id',
                'name',
                'grade' => [
                    'id',
                    'name'
                ],
                'user' => [
                    'id',
                    'username'
                ],
                'avatar',
                'phone'
            ]);
    }

    public function test_try_to_update_profile_as_other_user()
    {
        $this
            ->actingAs(User::factory()->create())
            ->patchJson('/api/users/profiles/' . $this->profile->id, [
                ...User::factory()->definition(),
                ...Profile::factory()->definition(),
                'phone' => '01544875424',
                'grade_id' => Grade::factory()->create()->id,
            ])
            ->assertUnauthorized()
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function test_try_to_update_profile_as_profile_owner()
    {
        $this
            ->actingAs($this->profile->user)
            ->patchJson('/api/users/profiles/' . $this->profile->id, [
                ...User::factory()->definition(),
                ...Profile::factory()->definition(),
                'phone' => '01544875424',
                'grade_id' => Grade::factory()->create()->id,
            ])
            ->assertSuccessful()
            ->assertSimilarJson([
                'message' => __('profile.updated')
            ]);
    }
}
