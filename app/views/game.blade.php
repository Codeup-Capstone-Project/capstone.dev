@extends('layouts.master')


@section('meta-token')
	<meta name="_token" content="{{ csrf_token() }}" />
@stop


@section('title')
    <title>Play | TyleNinja</title>
@stop


@section('content')
	<div class="container pad-top pad-bot">
    	<div class="row">
		    <div class="col s12 l6">
    			<div class="card-panel z-depth-2">
	    			<h5 class="level">Choose Difficulty Level</h5>
	    			<button id='easy' class="btn waves-effect waves-light level blue lighten-2" type="submit" data-value='3'>Easy</button>
	    			<button id='3x3' class="btn waves-effect waves-light level cyan accent-4" type="submit" data-value='3'>3x3</button>
	    			<button id='4x4' class="btn waves-effect waves-light level purple accent-4" type="submit" data-value='4'>4x4</button>
	    			<button id='5x5' class="btn waves-effect waves-light level pink accent-4" type="submit" data-value='5'>5x5</button>
	    			<button id="start" class="btn waves-effect waves-light start hidden" type="submit" name="start">Start</button>
	    			<button id="reset" class="btn waves-effect waves-light yellow lighten-2 hidden" type="submit" name="reset">Reset</button>
	    			<button id="quit" class="btn waves-effect waves-light red lighten-2 restart hidden" type="submit" name="quit">Quit</button>
	    			<button id="newGame" class="btn waves-effect waves-light blue lighten-2 hidden" type="submit" name="newGame">New Game</button>
		    		<div>
		    			<h5 id="moves">Moves: 0</h5>
		    			<h5 id="timer"><time>00:00:00:00</time></h5>
		    		</div>
	    		</div>
			</div>
    		<div class="col s12 l5 offset-l1">
    			<div class="card-panel z-depth-2">
	    			<div id='gameBoard'></div>
    			</div>
    		</div>
    	</div>
    </div>
	{{ Form::token() }}
@stop


@section('game-script')
    <script src="/js/game.js"></script>
@stop

