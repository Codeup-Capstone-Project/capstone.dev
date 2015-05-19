<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('username')->unique()->index();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('facebook_id')->nullable();
			$table->string('linkedin_id')->nullable();
			$table->text('profile_photo_url')->nullable();
			$table->string('facebook_profile_url')->nullable();
			$table->string('linkedin_profile_url')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
