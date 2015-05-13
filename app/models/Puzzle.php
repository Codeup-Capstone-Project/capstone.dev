<?php


class Puzzle extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'puzzles';	//not necessary because Laravel knows based on the class name, but it doesn't hurt anything

	

	// rules for creating a user or logging in
	public static $rules = [
		'username_or_email' => 'required',
		'password'       	=> 'required'
	];


	

	// Define the relationship between a puzzle and its stats
	public function stats()
	{
		// connects each puzzle to its stats
		return $this->hasMany('Stat');
	}
}



