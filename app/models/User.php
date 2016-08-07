<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{
	protected $table = 'users';
	protected $fillable = [
		'username', 
		'password', 
		'email', 
		'firstname',
		'lastname',
		'type',
		'rememberToken'
	];

	protected $hidden = ['password', 'rememberToken'];

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