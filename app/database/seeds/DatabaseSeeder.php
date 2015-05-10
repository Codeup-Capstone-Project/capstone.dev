<?php


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// delete pre-existing versions of tables in the opposite order they 
		// were seeded in to avoid foreign key conflict errors
		DB::table('posts')->delete();
		DB::table('users')->delete();

		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('PostsTableSeeder');
	}

}
