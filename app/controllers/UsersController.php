<?php 

use Yodme\Transformer\UserTransformer;
use Sorskod\Larasponse\Larasponse;

class UsersController extends ApiController {

	protected $fractal;
	
	public function __construct(Larasponse $fractal)
	{
		$this->fractal = $fractal;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return $this->respond([
			'users' => $this->fractal->collection($users, new UserTransformer())
		]);
			

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		if ( ! $user)
		{
			return $this->respondNotFound('User doesnt exist!');
		}

		return $this->respond([
			'user'  => $this->fractal->item($user, new UserTransformer())
		]);

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function postSignIn()
	{
		if ($this->postRequest()) 
		{
			$validator = $this->loginValidator();

			if ($validator->passes())
			{
				$credentials = $this->getLoginCredentials();

				if (Auth::attempt($credentials)) 
				{
					$user = User::find(Auth::id());
					$this->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
					return $this->respond([
						'success' => [
							'user'  => $this->fractal->item($user, new UserTransformer()),
							'status_code' => $this->getStatusCode(),
							'message' => 'Ok'
						]
					]);
					// return Response::json([
					// 	'message' => 'Authenticated!',
					// 	'code' => 200
					// ]);
				}
					return $this->respondUnauthorized('Anauthorized user');
			}
				return $this->respondBadRequest('User Bad Request');
				
		}
	}

	protected function postRequest()
	{
		return Input::server('REQUEST_METHOD') == 'POST';
	}

	protected function loginValidator()
	{
		return Validator::make(Input::all(), [
			'username' => 'required',
			'password' => 'required'
		]);
	}

	protected function getLoginCredentials()
	{
		return [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];
	}

}