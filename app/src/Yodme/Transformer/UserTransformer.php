<?php namespace Yodme\Transformer;

use User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
	        'id'      => (int) $user->id,
	        'username'   => $user->username,
	        'email'    => $user->email,
	        'fname' => $user->firstname,
	        'lname' => $user->lastname,
	        'user_type' => $user->type,
	        'token' => $user->remember_token
	    ];
	}
}