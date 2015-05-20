<?php

class GameController extends BaseController {

	public function __construct()
	{
		// Call the parent constructor for CSRF token
		parent::__construct();
		$this->beforeFilter( 'auth' );
	}

	//called from url: capstone.dev/play/{$size}
	public function getIndex($size = NULL)
	{
		$initialPositions = false;
		return View::make('game')->with(['size' => $size, 'initialPositions' => $initialPositions]);
	}

	//called from url: capstone.dev/play/game/{$id?}
	public function getGame($id = NULL)
	{
		$puzzle = Puzzle::find($id);

		if (!$puzzle){
			return App::abort(404);
		}

		$initialPositions = $puzzle->initial_block_positions;
		$unserializedPositions = unserialize($initialPositions);
		$arrayString = implode(',', $unserializedPositions);
		$size = $puzzle->size;

		return View::make('game')->with(['initialPositions' => $arrayString, 'size' => $size]);
	}

	public function getLeaders($size)
	{
		$query = Stat::with('user', 'puzzle');

		$stats = $query	->where('finished_game', '=', 1)
						->orderBy('game_time')
						->orderBy('created_at')
						->get();

		return $pageToPass = View::make('leader')->with(['stats' => $stats, 'size' => $size])->render();
			
	}

	//called from any POST to '/play/stats'
	public function postStats()
	{
		//Note: the positions array is being serialized by mutator before insertion
		//Note: finished_game is being cast to a boolean by mutator before insertion

		$stats = new Stat;
		$stats->user_id = Auth::user()->id;
		$stats->puzzle_id = Input::get('puzzle_id');
		$stats->last_block_positions = Input::get('newBlockPositions');
		$stats->moves = Input::get('moves');
		$stats->game_time = Input::get('time');
		$stats->finished_game = Input::get('gameFinished');
		$stats->save();
	}

	//called from any POST to '/play/puzzle'
	public function postPuzzle()
	{
		//'get' the positions array from ajax post and serialize it before insertion
		// $initialPositions = Input::get('initialBlockPositions');

		//create query to insert puzzle into db table
		$puzzle = new Puzzle;
		$puzzle->type = Input::get('type');
		$puzzle->size = Input::get('size');
		$puzzle->initial_block_positions = Input::get('initialBlockPositions');
		$puzzle->save();

		return $puzzle_id = $puzzle->id;

	}
}


