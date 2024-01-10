<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'id' => $this->whenHas('id'),
			'title' => $this->whenHas('title'),
			'description' => $this->whenHas('description'),
			'price' => $this->whenHas('price'),
			'type' => $this->whenHas('type'),
			'created_at' => $this->whenHas('created_at', fn() => $this->created_at->diffForHumans()),
			'updated_at' => $this->whenHas('updated_at', fn() => $this->updated_at->diffForHumans()),
		];
	}
}
