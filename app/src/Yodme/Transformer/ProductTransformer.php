<?php namespace Yodme\Transformer;

use Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
	public function transform(Product $product)
	{
		return [
			'id' => (int) $product->id,
			'path' => $product->imagePath,
			'title' => $product->title,
			'desc' => $product->description,
			'price' => (int) $product->price
		];
	}
}