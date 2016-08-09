<?php

use Yodme\Transformer\ProductTransformer;
use Sorskod\Larasponse\Larasponse;

class ProductController extends ApiController {

	protected $fractal;

	public function __construct(Larasponse $fractal)
	{
		$this->fractal = $fractal;
	}

	/**
	 * Display a listing of resource
	 * @return response
	 */
	public function index($categoryId=null)
	{
		$products = $this->getProducts($categoryId);
		if ($products->count() > 0) {
			return $this->respond([
				'products' => $this->fractal->collection($products, new ProductTransformer())
			]);
		}
		return $this->respondNotFound('No available products in this category!');
		
	}

	public function getProducts($categoryId)
	{
		return $categoryId ? Product::where('category_id', $categoryId)->get() : Product::orderBy('id','DESC')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /product/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /product
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
		if ( ! $product) 
		{
			return $this->respondNotFound('Product doesnt exist!');
		}

		$this->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
		return $this->respond([
			'success' => [
				'product' => $this->fractal->item($product, new ProductTransformer()),
				'status_code' => $this->getStatusCode(),
				'message' => 'Ok'
			]
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /product/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}