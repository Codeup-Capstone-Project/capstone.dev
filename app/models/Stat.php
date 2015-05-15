<?php


	class Stat extends BaseModel
	{
		protected $table = 'stats';

		// WIP - "work in progress"
		// public static function gameSessionGenerator()
		// {
		// 	//need a function that generates a rand(5)
		// 	$session = rand(5);
		// 	//then searches sessions column to see if that number exists
		// 	$query = Stat::where('session', '=', $session);
		// 	//if not, return that number
		// 	//if it does, repeat
		// }

		// Mutator that sets game time format before insertion into database
		public function setGameTimeAttribute($value)
		{
			//turn game time string into an array
		    $gameTime = explode(":", $value);
		    $milliseconds = array_pop($gameTime);
		    //convert milliseconds to microseconds
		    $microseconds = $milliseconds * 1000;
		    $seconds = array_pop($gameTime);
		    $fractionalSeconds = $seconds . "." . $microseconds;
		    //push seconds.microseconds onto end of gameTime array
		    array_push($gameTime, $fractionalSeconds);
		    $gameTime = implode(":", $gameTime);

		    $this->attributes['game_time'] = $gameTime;
		}

		// Mutator that serializes block positions array before insertion into database
		public function setLastBlockPositionsAttribute($value)
		{
		    $this->attributes['last_block_positions'] = serialize($value);
		}

		//Mutator that parses strings of 'true' and 'false' to their proper integer values
		//laravel boolean datatype needs 'false' and 'true' cast to integers before storing because it's stupid
		public function setFinishedGameAttribute($value)
		{
			$this->attributes['finished_game'] = ($value === 'true') ? 1 : 0;
		}

		// connects each stat to its user
		public function user()
		{	
			return $this->belongsTo('User');
		}
		
		// connects each stat to its puzzle
		public function puzzle()
		{	
			return $this->belongsTo('Puzzle');
		}

	}


