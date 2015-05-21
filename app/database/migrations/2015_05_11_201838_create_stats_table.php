<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('puzzle_id')->unsigned();
			$table->foreign('puzzle_id')->references('id')->on('puzzles');
			$table->integer('game_session')->nullable();
			$table->text('last_block_positions');
			$table->integer('moves');
			$table->time('game_time')->nullable();	
			$table->boolean('finished_game');
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
		Schema::drop('stats');
	}

}
