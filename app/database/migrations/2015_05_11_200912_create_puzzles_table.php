<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePuzzlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('puzzles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->integer('size')->unsigned();
			$table->text('initial_block_positions');
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
		Schema::drop('puzzles');
	}

}
