<?php

class GameController extends BaseController {


	public function showGame($id = 1)
	{
		return View::make('game');
	}

}