<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Factory::create();

		for($i = 0; $i < 101; $i++) {
			$words = rand(3, 8);
			$title = $faker->unique()->sentence($words);
			$user = User::all()->random();
			// $user_id = rand(1, 100);

			$post = Post::create(array(
				'title' => $title,
				'body' => $faker->realText(),
				'slug' => $title,
				'user_id' => $user->id
			));
		}
	}

}