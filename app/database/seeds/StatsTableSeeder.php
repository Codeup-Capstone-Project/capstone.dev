<?php


class StatsTableSeeder extends Seeder {

	public function run()
	{
		$array1 = [1, 2, 3, 4, 5, 6, 7, 8, 0];

		$stats3x3 = [
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 1, 
				'last_block_positions' => $array1, 
				'moves' 			   => 999, 
				'game_time' 		   => '23:59:59', 
				'finished_game' 	   => 'true' 
			],
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 1, 
				'last_block_positions' => $array1, 
				'moves' 			   => 1025, 
				'game_time' 		   => '22:37:21', 
				'finished_game' 	   => 'true' 
			],
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 1, 
				'last_block_positions' => $array1, 
				'moves' 		   	   => 874, 
				'game_time'  		   => '21:54:37', 
				'finished_game' 	   => 'true' 
			]
		]; 

		foreach($stats3x3 as $stat) {
			$stat1 = new Stat;

			foreach($stat as $key => $value) {
				$stat1->$key = $value;
			}
			$stat1->save();
		}


		$array2 = [14, 3, 1, 10, 13, 5, 11, 0, 6, 12, 7, 8, 2, 4, 9, 15];
		
		$stats4x4 = [
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 2, 
				'last_block_positions' => $array2, 
				'moves' 			   => 1999, 
				'game_time' 		   => '33:59:59', 
				'finished_game' 	   => 'true'
			],
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 2, 
				'last_block_positions' => $array2, 
				'moves' 			   => 2025, 
				'game_time' 		   => '32:37:21', 
				'finished_game' 	   => 'true'
			],
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 2, 
				'last_block_positions' => $array2, 
				'moves' 		   	   => 1874, 
				'game_time'  		   => '31:54:37', 
				'finished_game' 	   => 'true'
			]
		]; 

		foreach($stats4x4 as $stat) {
			$stat2 = new Stat;

			foreach($stat as $key => $value) {
				$stat2->$key = $value;
			}
			$stat2->save();
		}

	
		$array3 = [14, 2, 1, 10, 13, 5, 11, 3, 6, 12, 7, 8, 0, 4, 9, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
		
		$stats5x5 = [
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 3, 
				'last_block_positions' => $array3, 
				'moves' 			   => 2999, 
				'game_time' 		   => '43:59:59', 
				'finished_game' 	   => 'true' 
			],
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 3, 
				'last_block_positions' => $array3, 
				'moves' 			   => 3025, 
				'game_time' 		   => '42:37:21', 
				'finished_game' 	   => 'true' 
			],
			[ 	'user_id' 			   => 1, 
				'puzzle_id' 		   => 3, 
				'last_block_positions' => $array3, 
				'moves' 		   	   => 2874, 
				'game_time'  		   => '41:54:37', 
				'finished_game' 	   => 'true' 
			]
		]; 

		foreach($stats5x5 as $stat) {
			$stat3 = new Stat;

			foreach($stat as $key => $value) {
				$stat3->$key = $value;
			}
			$stat3->save();
		}

	}

}


