<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	private const ALLOWED_SORT_FIELDS = [
		'id',
		'title',
		'description',
		'price',
		'type',
	];

	private const ALLOWED_SEARCH_FIELDS = [
		'title',
		'description',
	];

	private const ALLOWED_FILTER_FIELDS = [
		'id',
		'title',
		'description',
		'type',
	];

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$data = Product::query()
			->when($request->has('sort'), function ($query) use ($request) {
				if (!in_array($request->input('sort'), self::ALLOWED_SORT_FIELDS)) {
					return $query;
				}

				$direction = $request->input('direction') === 'desc' ? 'desc' : 'asc';
				$field = $request->input('sort');

				$query->orderBy($field, $direction);
			})
			->when($request->has('search'), function ($query) use ($request) {
				$search = $request->input('search');

				$query->where(function ($query) use ($search) {
					foreach (self::ALLOWED_SEARCH_FIELDS as $field) {
						$query->orWhere($field, 'like', "%{$search}%");
					}
				});
			})
			->when($request->has('filters'), function ($query) use ($request) {
				$filter = $request->input('filters', []);

				foreach ($filter as $field => $value) {
					if (!in_array($field, self::ALLOWED_FILTER_FIELDS)) {
						continue;
					}

					$query->where($field, $value);
				}
			})
			->paginate($request->integer('per_page', 10));

		return ProductResource::collection($data);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ProductRequest $request)
	{
		$data = $request->validated();

		$product = Product::query()->create($data);

		return ProductResource::make($product);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Product $product)
	{
		return ProductResource::make($product);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(ProductRequest $request, Product $product)
	{
		$data = $request->validated();

		$product->update($data);

		return ProductResource::make($product);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Product $product)
	{
		$product->delete();

		return response()->noContent();
	}
}
