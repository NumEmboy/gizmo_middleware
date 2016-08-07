<?php

class ApiController extends \BaseController {

	/**
	 * @var integer
	 */
	protected $statusCode = 200;

	/**
	 * Get status code
	 * @return $statusCode
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * Set status code
	 * @param int $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}

	/**
	 * create a respond not found function
	 * @param string $message
	 * @return json respond not found with set status code
	 */
	public function respondNotFound($message = 'Not Found!')
	{
		return $this->setStatusCode(\Illuminate\Http\Response::HTTP_NOT_FOUND)->respondWithError($message);
	}

	/**
	 * create a respond internal error function
	 * @param  string $message
	 * @return json respond internal error with status code
	 */
	public function respondInternalError($message = 'Internal Error!')
	{
		return $this->setStatusCode(\Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	/**
	 * create a json respond function
	 * @param string $data
	 * @param array $headers
	 * @return json response
	 */
	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	/**
	 * create a respond with error function
	 * @param  string $message
	 * @return json response with status code
	 */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'status_code' => $this->getStatusCode(),
				'message' => $message
			]
		]);
	}

	public function respondUnauthorized($message = 'Unauthorized')
	{
		return $this->setStatusCode(\Illuminate\Http\Response::HTTP_UNAUTHORIZED)->respondWithError($message);
	}

	public function respondBadRequest($message = 'Bad Request')
	{
		return $this->setStatusCode(\Illuminate\Http\Response::HTTP_BAD_REQUEST)->respondWithError($message);
	}
}