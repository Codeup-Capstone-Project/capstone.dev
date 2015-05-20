<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// a user with known password for testing purposes
		$user1 = new User;
		$user1->first_name 		  = 'John';
		$user1->last_name  		  = 'Doe';
		$user1->username 		  = 'guest';
		$user1->email 			  = 'guest@gmail.com';
		$user1->password 		  = $_ENV['USER_PASS'];
		$user1->profile_photo_url = '/img/ninja_avatar.jpg';
		$user1->save();
	}

}
