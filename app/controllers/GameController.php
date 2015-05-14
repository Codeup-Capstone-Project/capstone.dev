<?php

class GameController extends BaseController {

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
		//'get' the positions array from ajax post and serialize it before insertion
		$lastPositions = Input::get('newBlockPositions');
		$finishedGame = Input::get('gameFinished');

		//create query to insert stats into db table
		$stats = new Stat;
		// $stats->user_id = Auth::user()->id;
		$stats->user_id = rand(1, 5);
		$stats->puzzle_id = 1;
		$stats->last_block_positions = $lastPositions;
		$stats->moves = Input::get('moves');
		$stats->game_time_in_seconds = Input::get('time');	// will connect individual words in the title with hyphens for use as a url appendage
		$stats->finished_game = $finishedGame;
		$stats->save();
	}
}


