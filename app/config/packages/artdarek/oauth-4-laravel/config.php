<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => getenv('FACEBOOK_ID'),
            'client_secret' => getenv('FACEBOOK_SECRET'),
            'scope'         => array('email'),
        ),		

        /**
		 * Linkedin
		 */
        'Linkedin' => array(
            'client_id'     => getenv('LINKEDIN_ID'),
            'client_secret' => getenv('LINKEDIN_SECRET'),
            'scope'         => array('r_emailaddress', 'r_basicprofile'),
        ),
	)

);