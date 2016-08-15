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
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);

		if ($validator->passes()) {
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			$this->setStatusCode(\Illuminate\Http\Response::HTTP_CREATED);
			return Response::json([
				'message' => 'Successfully created!',
				'status_code' => $this->getStatusCode()
			]);
		}

		return Response::json([
			'message' => $validator->messages()
		]);
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
	public function destroy()
	{
		$id = Input::get('id');
		$category = Category::find($id);
		if ($category) {
			$category->delete();
			return Response::json([
				'message' => 'Category deleted!'
			]);
		}
		return Response::json([
			'message' => 'Category doesnt exist!'
		]);
	}

}