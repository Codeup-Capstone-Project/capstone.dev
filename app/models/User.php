<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';	//not necessary because Laravel knows based on the class name, but it doesn't hurt anything

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	// rules for creating a user or logging in
	public static $rules = [
		'username_or_email' => 'required',
		'password'       	=> 'required'
	];


	// Mutator that stores all usernames as lower-case
	public function setUsernameAttribute($value)
	{
	    $this->attributes['username'] = strtolower($value);
	}

	// Mutator that hashes all passwords before storing
	public function setPasswordAttribute($value)
	{
	    $this->attributes['password'] = Hash::make($value);
	}

	// Define the relationship between a user and their stats
	public function stats()
	{
		// connects each user to their stats
		return $this->hasMany('Stat');
	}
}



