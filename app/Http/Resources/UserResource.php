<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
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
			'name' => $this->whenHas('name'),
			'email' => $this->whenHas('email'),
			'email_verified_at' => $this->whenHas('email_verified_at', fn() => $this->email_verified_at->diffForHumans()),
			'created_at' => $this->whenHas('created_at', fn() => $this->created_at->diffForHumans()),
			'updated_at' => $this->whenHas('updated_at', fn() => $this->updated_at->diffForHumans()),
		];
	}
}
