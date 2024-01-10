<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;

	protected function signIn()
	{
		$user = \App\Models\User::factory()->create();

		$this->actingAs($user);

		return $user;
	}
}
