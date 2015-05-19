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
            'client_id'     => $_ENV['FACEBOOK_ID'],
            'client_secret' => $_ENV['FACEBOOK_SECRET'],
            'scope'         => array('email'),
        ),		

        /**
		 * Linkedin
		 */
        'Linkedin' => array(
            'client_id'     => $_ENV['LINKEDIN_ID'],
            'client_secret' => $_ENV['LINKEDIN_SECRET'],
            'scope'         => array('r_emailaddress', 'r_basicprofile'),
        ),
	)

);