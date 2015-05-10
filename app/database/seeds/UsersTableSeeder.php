<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Factory::create();

		for($i = 0; $i < 100; $i++) {
			$user = User::create(array(
				'first'		=> $faker->firstName($gender = null|'male'|'female'),
				'last'		=> $faker->lastname,
				'username' 	=> $faker->unique()->userName,
				'email' 	=> $faker->unique()->email,
				'password' 	=> $faker->password 
			));
		}

		// a user with known password for testing purposes
		$user1 = new User;
		$user1->first = 'John';
		$user1->last = 'Doe';
		$user1->username = 'guest';
		$user1->email = 'guest@gmail.com';
		$user1->password = $_ENV['USER_PASS'];
		$user1->save();
	}

}