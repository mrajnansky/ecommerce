<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTokenControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->getJson('api/v1/auth/tokens');
        $response->assertStatus(405);
    }

    public function testStore()
    {
        $user = User::factory()->create([
            'password' => Hash::make('123456789'),
        ]);
        $response = $this->postJson('api/v1/auth/tokens', [
            'email' => $user->email,
            'password' => '123456789',
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'access_token',
            'token_type',
        ]);
    }

    public function testShow()
    {
        $response = $this->getJson('api/v1/auth/tokens');
        $response->assertStatus(405);
    }

    public function testUpdate()
    {
        $response = $this->putJson('api/v1/auth/tokens');
        $response->assertStatus(405);
    }

    public function testDestroy()
    {
        $response = $this->deleteJson('api/v1/auth/tokens');
        $response->assertStatus(405);
    }
}
