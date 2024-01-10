<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'title' => fake()->word(),
			'description' => fake()->paragraph(),
			'price' => fake()->randomFloat(2, 0, 1000),
			'type' => fake()->word(),
		];
	}

	public function user($user)
	{
		return $this->state(function (array $attributes) use ($user) {
			return [
				'user_id' => $user->id,
			];
		});
	}
}
