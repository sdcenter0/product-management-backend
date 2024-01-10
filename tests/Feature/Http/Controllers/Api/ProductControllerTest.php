<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
	use RefreshDatabase;

	public function setUp(): void
	{
		parent::setUp();

		// $this->withoutExceptionHandling();

		// Set up the authenticated user
		$this->signIn();
	}

	public function test_it_can_create_a_product()
	{
		$data = [
			'title' => 'Keyboard',
			'description' => 'The keyboard is black',
			'price' => 50,
			'type' => 'electronic',
		];

		$response = $this->postJson(route('api.products.store'), $data);

		$response->assertCreated();

		$this->assertDatabaseHas(Product::class, $data);
	}

	public function test_it_can_update_a_product()
	{
		$product = Product::factory()->create();

		$data = [
			'title' => 'Keyboard',
			'description' => 'The keyboard is black',
			'price' => 50,
			'type' => 'electronic',
		];

		$response = $this->putJson(route('api.products.update', $product), $data);

		$response->assertOk();

		$this->assertDatabaseHas(Product::class, $data);
	}

	public function test_it_can_delete_a_product()
	{
		$product = Product::factory()->create();

		$response = $this->deleteJson(route('api.products.destroy', $product));

		$response->assertNoContent();

		$this->assertDatabaseMissing(Product::class, $product->toArray());
	}

	public function test_it_can_list_products()
	{
		Product::factory()->count(10)->create();

		$response = $this->getJson(route('api.products.index'));

		$response->assertOk();

		$response->assertJsonCount(10, 'data');
	}

	public function test_it_can_show_a_product()
	{
		$product = Product::factory()->create();

		$response = $this->getJson(route('api.products.show', $product));

		$response->assertOk();

		$response->assertJsonFragment([
			'id' => $product->id,
			'title' => $product->title,
			'description' => $product->description,
			'price' => $product->price,
			'type' => $product->type,
			'created_at' => $product->created_at->diffForHumans(),
			'updated_at' => $product->updated_at->diffForHumans(),
		]);
	}

	public function test_it_cannot_show_a_product_belongs_to_another_user()
	{
		$product = Product::factory()->create();

		$this->signIn();

		$response = $this->getJson(route('api.products.show', $product));

		$response->assertNotFound();
	}

	public function test_it_cannot_update_a_product_belongs_to_another_user()
	{
		$product = Product::factory()->create();

		// Sign in another user
		$this->signIn();

		$data = [
			'title' => 'Keyboard',
			'description' => 'The keyboard is black',
			'price' => 50,
			'type' => 'electronic',
		];

		$response = $this->putJson(route('api.products.update', $product), $data);

		$response->assertNotFound();
	}

	public function test_it_cannot_delete_a_product_belongs_to_another_user()
	{
		$product = Product::factory()->create();

		$this->signIn();

		$response = $this->deleteJson(route('api.products.destroy', $product));

		$response->assertNotFound();
	}
}
