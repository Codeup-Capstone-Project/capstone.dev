<?php

class GameController extends BaseController {

	public function __construct()
	{
		// Call the parent constructor for CSRF token
		parent::__construct();
		$this->beforeFilter( 'auth' );
	}

	//called from url: capstone.dev/play
	public function getIndex()
	{
		return View::make('game');
	}

	//called from url: capstone.dev/play/game/{$id?}
	public function getGame($id = 1)
	{
		return View::make('game')->with(['id'=>$id]);

		$pageToPass = View::make('game')->with(['id'=>$id])->render();
		return $pageToPass;
	}

	public function getStats($size)
	{
		$query = Stat::with('user')
						->with(array('puzzle' => function($query)
						{
						    $query->where('size', '=', 3);

						}));

		if (Input::has('search')) {
			$search = Input::get('search');
			$query->where('username', 'like', "%$search%");
		}

		$stats = $query	->where('finished_game', '=', 1)
						->orderBy('game_time')
						->orderBy('created_at')->take(5)->get();


		return View::make('leader')->with(['stats' => $stats]);
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


