<?php

use Yodme\Transformer\CategoryTransformer;
use Sorskod\Larasponse\Larasponse;

class CategoryController extends ApiController {

	protected $fractal;

	public function __construct(Larasponse $fractal)
	{
		$this->fractal = $fractal;
	}

	/**
	 * Display a listing of the resource.
	 * GET /category
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
		return $this->respond([
			'categories' => $this->fractal->collection($categories, new CategoryTransformer())
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::find($id);
		if ( ! $category) 
		{
			return $this->respondNotFound('Category doesnt exist!');
		}

		$this->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
		return $this->respond([
			'success' => [
				'category' => $this->fractal->item($category, new CategoryTransformer()),
				'status_code' => $this->getStatusCode(),
				'message' => 'Ok'
			]	
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /category/{id}/edit
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
	 * PUT /category/{id}
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
	 * DELETE /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}