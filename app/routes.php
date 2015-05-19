<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::controller('users', 'UsersController');

Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@logout');

Route::controller('play', 'GameController');

Route::get('fb', function() {
	// public function loginWithFacebook()
	// {

		OAuth::setHttpClient('CurlClient');
		
		// get data from input
	    $code = Input::get( 'code' );

	    // get fb service
	    $fb = OAuth::consumer( 'Facebook' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from facebook, get the token
	        $token = $fb->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $fb->request( '/me' ), true );

	        // Request user's profile picture
	        $picture = json_decode( $fb->request( '/me/picture?type=large&redirect=false' ), true );

	        //Var_dump
	        //display whole array().
	        // var_dump($result);
	        // var_dump($picture);

	        // get data from input
	        $user = [
	                'facebook_id' 		=> $result['id'],
	                'email'		  		=> $result['email'],
	                'first_name'  		=> $result['first_name'],
	                'last_name'	  		=> $result['last_name'],
	                'profile_photo_url' => $picture['data']['url']
	        ];

	        // for testing:
	        // $message = 'Your unique facebook user id is: ' . $user['facebook_id'] . PHP_EOL . 
	        // 			' your email is ' . $user['email'] . PHP_EOL .
	        // 			' your name is ' . $user['first_name'] . ' ' . $user['last_name'] . 
	        // 			' and the url to your profile photo is ' . $user['profile_photo_url'];
	        // echo $message. "<br/>";

	        // try to login
            // get user from db by facebook_id
            $userExists = User::where( [ 'facebook_id' => $user['facebook_id'] ] )->first();
            // var_dump($userExists);

            // check if user exists
            if ( $userExists ) {
                    // login user
                    Auth::login( $userExists );

                    // build message with some of the resultant data
                    $message = 'Your unique facebook user id is: ' . $user['facebook_id'] . ' and your name is ' . $user['first_name'];
// dd(Auth::user());
                    // redirect to user profile
                    return Redirect::action( 'GameController@getIndex' );
                            // ->with( 'flash_success', $message );

            } else {
                    // FIRST TIME FB LOGIN

            		// create a unique username for them
            		// concatinate first letter of first name to their last name
            		$firstnameArray = str_split($user['first_name']);
            		$firstLetter = array_shift($firstnameArray);
            		$username = $firstLetter . $user['last_name'];

            		// check if it already exists in database
            		$usernameExists = User::where([ 'username' => $username ])->first();

            		// if it does, append an incrementing number to the back and keep checking 
            		if ($usernameExists) {
            			$suffix = 2;
            			do {
            				$username = $username . $suffix;
            				$usernameExists = User::where([ 'username' => $username ])->first();
            				$suffix++;
            			} while($usernameExists);
            		}

                    // create new user and save it into db
                    $newUser = new User;
                    $newUser->first_name  = strtolower($user['first_name']);
                    $newUser->last_name   = strtolower($user['last_name']);
                    $newUser->username 	  = strtolower($username);
                    $newUser->password    = $_ENV['USER_PASS'];
                    $newUser->email 	  = $user['email'];
                    $newUser->facebook_id = $user['facebook_id'];
                    $newUser->profile_photo_url = $user['profile_photo_url'];
                    $newUser->save();

                    // login user
                    Auth::login( $newUser );

                    // build message with some of the resultant data
                    $message_success = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
                    $message_notice = 'Account Created.';

                    // redirect to home page
                    return Redirect::route( "users/show/$username" );
                            // ->with( 'flash_success', $message_success )
                            // ->with( 'flash_notice', $message_notice );

            }

	    } else {
		    // if not ask for permission first
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
	        return Redirect::to( (string)$url );
	    }
	// }
});

