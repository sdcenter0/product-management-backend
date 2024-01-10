<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
  use RefreshDatabase;

	public function test_it_can_register_a_user()
	{
		$data = [
			'name' => 'John Doe',
			'email' => 'test@test.com',
			'password' => 'password',
			'password_confirmation' => 'password',
		];

		$response = $this->postJson(route('api.register'), $data);

		$response->assertCreated();

		$this->assertDatabaseHas(User::class, [
			'name' => $data['name'],
			'email' => $data['email'],
		]);
	}

	public function test_it_can_login_a_user()
	{
		$user = User::factory()->create();

		$data = [
			'email' => $user->email,
			'password' => 'password',
		];

		$response = $this->postJson(route('api.login'), $data);

		$response->assertOk();

		$this->assertAuthenticatedAs($user);
	}

	public function test_it_can_logout_a_user()
	{
		$user = User::factory()->create();

		$this->actingAs($user);

		$response = $this->actingAs($user)->postJson(route('api.logout'));

		$response->assertOk();

		$this->assertGuest('web');
	}

	public function test_it_can_get_the_current_user()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->getJson(route('api.user'));

		$response->assertOk();

		$response->assertJson([
			'data' => [
				'id' => $user->id,
				'name' => $user->name,
				'email' => $user->email,
			]
		]);
	}
}
