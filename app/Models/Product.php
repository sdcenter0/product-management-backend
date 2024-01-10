<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
	use HasFactory;

	protected $guarded = [];

	public static function boot()
	{
		parent::boot();

		static::addGlobalScope('user', function ($query) {
			if (auth()->guest()) {
				return;
			}

			$query->where('user_id', auth()->id());
		});
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
