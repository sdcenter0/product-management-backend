<?php

namespace App\Observers;
use App\Models\Product;

class ProductObserver
{
  public function creating(Product $product)
	{
		// Add the current user id to the product
		if (auth()->guest()) {
			return;
		}
		
		$product->user_id = auth()->id();
	}
}
