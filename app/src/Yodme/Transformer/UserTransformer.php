<?php namespace Yodme\Transformer;

use User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
	        'id'      => (int) $user->id,
	        'fname' => $user->firstname,
	        'lname' => $user->lastname,
	        'email'    => $user->email,
	        'telephone' => $user->telephone,
	        'is_admin' => (int) $user->admin == 1 ? 'Yes' : 'No',
	    ];
	}
}