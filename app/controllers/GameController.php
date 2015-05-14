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
	}

	//called from any POST to '/play/stats'
	public function postStats(){
		//Note: the positions array is being serialized by mutator before insertion
		//Note: finished_game is being cast to a boolean by mutator before insertion

		$puzzle_id = Puzzle::orderBy('id', 'DESC')->first();

		$stats = new Stat;
		$stats->user_id = Auth::user()->id;
		$stats->puzzle_id = $puzzle_id->id;
		$stats->last_block_positions = Input::get('newBlockPositions');
		$stats->moves = Input::get('moves');
		$stats->game_time_in_seconds = Input::get('time');
		$stats->finished_game = Input::get('gameFinished');
		$stats->save();
	}

	//called from any POST to '/play/puzzle'
	public function postPuzzle(){
		//'get' the positions array from ajax post and serialize it before insertion
		// $initialPositions = Input::get('initialBlockPositions');

		//create query to insert puzzle into db table
		$puzzle = new Puzzle;
		$puzzle->type = Input::get('type');
		$puzzle->size = Input::get('size');
		$puzzle->initial_block_positions = Input::get('initialBlockPositions');
		$puzzle->save();
	}
}


