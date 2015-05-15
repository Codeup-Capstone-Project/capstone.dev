<?php


	class Stat extends BaseModel
	{
		protected $table = 'stats';

		public static $rules = [
			'title'      => 'required|max:100',
    		'body'       => 'required|max:10000'
		];

		public static function gameSessionGenerator()
		{
			//need a function that generates a rand(5)
			$session = rand(5);
			$query = Stat::where('session', '=', $session);
			//then searches sessions column to see if that number exists
			//if not, return that number
			//if it does, repeat
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


		public function user()
		{
			// connects each stat to its user
			return $this->belongsTo('User');
		}

		public function puzzle()
		{
			// connects each stat to its puzzle
			return $this->belongsTo('Puzzle');
		}

	}


