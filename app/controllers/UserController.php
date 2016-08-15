<?php 

use Yodme\Transformer\UserTransformer;
use Sorskod\Larasponse\Larasponse;

class UserController extends ApiController {

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
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

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
	public function destroy()
	{
		$id = Input::get('id');
		$user = User::find($id);
		if ($user) {
			$user->delete();
			return Response::json([
				'message' => 'User deleted!'
			]);
		}
		return Response::json([
			'message' => 'User doesnt exist!'
		]);
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
			'email' => 'required',
			'password' => 'required'
		]);
	}

	protected function getLoginCredentials()
	{
		return [
			'email' => Input::get('email'),
			'password' => Input::get('password')
		];
	}

}