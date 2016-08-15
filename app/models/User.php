<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{
	
	use SoftDeletingTrait;

	protected $datas = ['deleted_at'];

	protected $table = 'users';
	
	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'password',
		'telephone',
		'type'
	];

	protected $hidden = ['password'];

	public static $rules = [
		'firstname' => 'required|min:3|alpha',
		'lastname' => 'required|min:3|alpha',
		'email' => 'required|email|unique:users',
		'password' => 'required|alpha_num|between:4,12|confirmed',
		'password_confirmation' => 'required|alpha_num|between:4,12',
		'telephone' => 'required|between:10,12',
		'admin' => 'integer'
	];

	/**
	 * Get the user identifier
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the user token
	 * @return mixed
	 */
	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	/**
	 * Set the user remember token
	 * @param string $value
	 */
	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	/**
	 * Get the user token name
	 * @return mixed
	 */
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	/**
	 * Get the user reminder email
	 * @return string email
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}