<?php

class SocialAuthController extends BaseController {


	public function loginWithLinkedin() 
	{

        // get data from input
        $code = Input::get( 'code' );

        $linkedinService = OAuth::consumer( 'Linkedin' );


        if ( !empty( $code ) ) {

            // This was a callback request from linkedin, get the token
            $token = $linkedinService->requestAccessToken( $code );
            // Send a request with it. Please note that XML is the default format.
            $result = json_decode($linkedinService->request('/people/~:(id,first-name,last-name,headline,member-url-resources,picture-urls::(original),location,public-profile-url,email-address)?format=json'), true);

            // For testing: show some of the resultant data
            // echo 'Your linkedin first name is ' . $result['firstName'] . 
            //     ' and your last name is ' . $result['lastName'] . 
            //     ' and your email is ' . $result['emailAddress'] .
            //     ' and your profile photo url is ' . $result['pictureUrls']['values'][0] . 
            //     ' and your public profile url is ' . $result['publicProfileUrl'] . "<br/>";

            //Var_dump
            //display whole array().
            // var_dump($result);


            // get data from input
            $user = [
                    'linkedin_id'        => $result['id'],
                    'email'              => $result['emailAddress'],
                    'first_name'         => $result['firstName'],
                    'last_name'          => $result['lastName'],
                    'profile_photo_url'  => $result['pictureUrls']['values'][0],
                    'profile_url'        => $result['publicProfileUrl']
            ];

            
            // try to login
            // get user from db by facebook_id
            $userExists = User::where( [ 'linkedin_id' => $user['linkedin_id'] ] )->first();
            // var_dump($userExists);

            // check if user exists
            if ( $userExists ) {
                    // login user
                    Auth::login( $userExists );

                    // redirect to user profile
                    Session::flash('successMessage', 'Account created successfully.');
                    return Redirect::action( 'GameController@getIndex' );

            } else {
                    // FIRST TIME LinkedIn LOGIN

                    // create a unique username for them
                    // only allow first 12 letters of last name
                    $lastnameArray = str_split($user['last_name']);
                    $lastnameArray = array_slice($lastnameArray, 0, 12);
                    $lastname = implode($lastnameArray);
                    // get the first letter of first name
                    $firstnameArray = str_split($user['first_name']);
                    $firstLetter = array_shift($firstnameArray);
                    // concatinate first letter of first name to their last name
                    $username = $firstLetter . $lastname;

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
                    $newUser->first_name           = strtolower($user['first_name']);
                    $newUser->last_name            = strtolower($user['last_name']);
                    $newUser->username             = strtolower($username);
                    $newUser->password             = $_ENV['USER_PASS'];
                    $newUser->email                = $user['email'];
                    $newUser->linkedin_id          = $user['linkedin_id'];
                    $newUser->profile_photo_url    = $user['profile_photo_url'];
                    $newUser->linkedin_profile_url = $user['profile_url'];
                    $newUser->save();

                    // login user
                    Auth::login( $newUser );

                    // redirect to game page
                    return Redirect::action( 'GameController@getIndex' );
            }

        } else {
        	// if not ask for permission first
            // get linkedinService authorization
            $url = $linkedinService->getAuthorizationUri(array('state'=>'DCEEFWF45453sdffef424'));

            // return to linkedin login url
            return Redirect::to( (string)$url );
        }


    }

    public function loginWithFacebook()
	{

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
	                'profile_photo_url' => $picture['data']['url'],
                    'profile_url'       => $result['link']
	        ];

	        // For testing: show some resultant data
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

                    // redirect to user profile
                    return Redirect::action( 'GameController@getIndex' );

            } else {
                    // FIRST TIME FB LOGIN

            		// create a unique username for them
                    // only allow first 12 letters of last name
                    $lastnameArray = str_split($user['last_name']);
                    $lastnameArray = array_slice($lastnameArray, 0, 12);
                    $lastname = implode($lastnameArray);
                    // get the first letter of first name
                    $firstnameArray = str_split($user['first_name']);
                    $firstLetter = array_shift($firstnameArray);
                    // concatinate first letter of first name to their last name
                    $username = $firstLetter . $lastname;

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
                    $newUser->first_name           = strtolower($user['first_name']);
                    $newUser->last_name            = strtolower($user['last_name']);
                    $newUser->username 	           = strtolower($username);
                    $newUser->password             = $_ENV['USER_PASS'];
                    $newUser->email 	           = $user['email'];
                    $newUser->facebook_id          = $user['facebook_id'];
                    $newUser->profile_photo_url    = $user['profile_photo_url'];
                    $newUser->facebook_profile_url = $user['profile_url'];
                    $newUser->save();

                    // login user
                    Auth::login( $newUser );

                    // redirect to game page
                    Session::flash('successMessage', 'Account created successfully.');
                    return Redirect::action( 'GameController@getIndex' );
            }

	    } else {
		    // if not ask for permission first
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
	        return Redirect::to( (string)$url );
	    }
	}



}