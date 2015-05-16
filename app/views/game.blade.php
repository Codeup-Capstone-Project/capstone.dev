@extends('layouts.master')


@section('meta-token')
	<meta name="_token" content="{{ csrf_token() }}" />
@stop


@section('title')
    <title>Play | TyleNinja</title>
@stop


@section('content')
	<div class="container game-container pad-bot">
    	<div class="row">
		    <div class="col s12 m5 l4 offset-l1">
    			<div class="card-panel game-menu blue-grey lighten-3 z-depth-2">
    				<div class="row menu-row">
    					<div class="col s5">
			    			<h6 class="menu-header">
			    				<span class="blue-grey-text text-darken-2 level bold">Choose Level</span>
			    				<span class="blue-grey-text text-darken-2 ready bold hidden">Click Start When&nbsp;Ready</span>
			    				<span class="blue-grey-text text-darken-2 hiya bold hidden">Hiya!</span>
			    				<span class="blue-grey-text text-darken-2 again bold hidden">Reset or New&nbsp;Game</span>
			    			</h6>
			    			<div class="divider-game-top"></div>
			    			<h6 class="blue-grey-text text-darken-2">Moves: <span id="moves" class="teal-text text-darken-1">0</span></h6>
			    			<div class="divider-game-middle"></div>
			    			<h6 class="blue-grey-text text-darken-2" id="timer"><time>00:00:00:00</time></h6>
		    			</div>
						<div class="col s6 offset-s1 m7">
			    			<button id='easy' class="btn-floating size-btn waves-effect waves-light level teal lighten-2" type="submit" data-value='3'>Easy</button>
			    			<button id='3x3' class="btn-floating size-btn waves-effect waves-light level teal" type="submit" data-value='3'>3x3</button>
			    			<button id='4x4' class="btn-floating size-btn waves-effect waves-light level teal darken-2" type="submit" data-value='4'>4x4</button>
			    			<button id='5x5' class="btn-floating size-btn waves-effect waves-light level teal darken-4" type="submit" data-value='5'>5x5</button>
			    			<button id="start" class="btn menu waves-effect waves-light start hidden" type="submit" name="start">Start</button>
			    			<button id="reset" class="btn menu waves-effect waves-light yellow lighten-2 hidden" type="submit" name="reset">Reset</button>
			    			<button id="quit" class="btn menu waves-effect waves-light red lighten-2 restart hidden" type="submit" name="quit">Quit</button>
			    			<button id="newGame" class="btn menu waves-effect waves-light blue lighten-2 hidden" type="submit" name="newGame">New Game</button>
		    			</div>
	    			</div>
	    		</div>
			</div>
    		<div class="col s12 m7 l5">
    			<div class="card-panel blue-grey lighten-5 z-depth-2">
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

