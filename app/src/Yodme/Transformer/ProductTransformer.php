<?php namespace Yodme\Transformer;

use Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
	public function transform(Product $product)
	{
		return [
			'id' 			=> (int) $product->id,
			'category_id' 	=> (int) $product->category_id,
			'title'		 	=> $product->title,
			'desc' 			=> $product->description,
			'price' 		=> (int) $product->price,
			'is_available' 	=> (boolean) $product->availability,
			'path' 			=> $product->imagePath,
		];
	}
}