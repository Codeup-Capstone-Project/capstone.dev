<?php


class PuzzlesTableSeeder extends Seeder {

	public function run()
	{
		$array1 = [1, 2, 3, 4, 0, 5, 7, 8, 6];
		//standard puzzle options
		$puzzle1 = new Puzzle;
		$puzzle1->type = '3x3';
		$puzzle1->size = 3;
		$puzzle1->initial_block_positions = $array1;
		$puzzle1->save();

		$array2 = [14, 3, 1, 10, 13, 5, 11, 0, 6, 12, 7, 8, 2, 4, 9, 15];
		//standard puzzle options
		$puzzle2 = new Puzzle;
		$puzzle2->type = '4x4';
		$puzzle2->size = 4;
		$puzzle2->initial_block_positions = $array2;
		$puzzle2->save();

		$array3 = [14, 2, 1, 10, 13, 5, 11, 3, 6, 12, 7, 8, 0, 4, 9, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
		//standard puzzle options
		$puzzle3 = new Puzzle;
		$puzzle3->type = '4x4';
		$puzzle3->size = 4;
		$puzzle3->initial_block_positions = $array3;
		$puzzle3->save();
	}

}



