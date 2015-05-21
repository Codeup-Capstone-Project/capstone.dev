<?php

class UsersController extends \BaseController {

	public function __construct()
	{
		// Call the parent constructor for CSRF token
		parent::__construct();
		$this->beforeFilter( 'auth', ['except' => ['getCreate', 'postStore']] );
	}

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		if(Auth::check())
		{
			// If user already logged in, do not show account creation screen. Redirect back to home.
			return Redirect::action('HomeController@showHome');
		}
		else
		{
			// Else, show the account creation screen.
			return View::make('users.create');
		}
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			Session::flash('errorMessage', 'Account not saved. See errors.');
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = new User();
		$user->first_name = strtolower(Input::get('first_name'));
		$user->last_name  = strtolower(Input::get('last_name'));
		$user->username   = Input::get('username');
		$user->email      = Input::get('email');
		$user->password   = Input::get('password');
		$user->profile_photo_url = "/img/ninja_avatar.jpg";
		$user->save();

		$id = $user->id;

		Auth::loginUsingId($id);
		Session::flash('successMessage', 'Account created successfully.');

		$first_name = $user->first_name;
		$email = $user->email;
		Mail::send('emails.welcome', array('first_name' => $first_name),
			function($message) use($email, $first_name)
			{
				$message->from('us@example.com', 'TyleNinja');
			    $message->to($email, $first_name)->subject('Welcome to TyleNinja!');
			}
		);

		return Redirect::action('HomeController@showHome');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($username)
	{
		$user = User::whereUsername($username)->first();

		//if no username is provided in url
		if(empty($user)){
			return App::abort(404);
		}
		//if username provided does not belong to logged in user
		if(Auth::user()->id != $user->id) {
			return App::abort(404);
		}

		$first_name = ucfirst($user->first_name);
		$last_name = ucfirst($user->last_name);

		$data = [
			"user"			   => $user,
			"first_name"       => $first_name,
			"last_name"        => $last_name,
			"userBestTime3x3"  => $user->bestTime(3),
			"userBestTime4x4"  => $user->bestTime(4),
			"userBestTime5x5"  => $user->bestTime(5),
			"userBestMoves3x3" => $user->bestMoves(3),
			"userBestMoves4x4" => $user->bestMoves(4),
			"userBestMoves5x5" => $user->bestMoves(5),
			"timeRank3x3"	   => $user->rankTime(3),
			"timeRank4x4"	   => $user->rankTime(4),
			"timeRank5x5"	   => $user->rankTime(5),
			"movesRank3x3"	   => $user->rankMoves(3),
			"movesRank4x4"	   => $user->rankMoves(4),
			"movesRank5x5"	   => $user->rankMoves(5)
		];
		return View::make('users.show')->with($data);
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($username)
	{
		$user = User::whereUsername($username)->first();

		//if no username is provided in url
		if(empty($user)){
			return App::abort(404);
		}

		//if username provided does not belong to logged in user
		if(Auth::user()->id != $user->id) {
			return App::abort(404);
		}

		$first_name = ucfirst($user->first_name);
		$last_name = ucfirst($user->last_name);

		$data = [
			"user" 		 => $user,
			"first_name" => $first_name,
			"last_name"  => $last_name
		];

		return View::make('users.edit')->with($data);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::updateRules($user->id));

		if ($validator->fails())
		{
			Session::flash('errorMessage', 'Update failed. See errors.');
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->save();

		Session::flash('successMessage', 'Account updated successfully.');
		return Redirect::action('UsersController@getShow', $user->username);
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDestroy($id)
	{
		$user = User::find($id);
		$user->delete();
		Session::flash('successMessage', 'Account deleted.');
		return Redirect::action('HomeController@showHome');
	}

}
