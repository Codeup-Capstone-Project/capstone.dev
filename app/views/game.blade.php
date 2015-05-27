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
			    			<button id='easy' class="btn-floating size-btn waves-effect waves-light teal lighten-1" type="submit" data-value='3'>Easy</button>
			    			<button id='3x3' class="btn-floating size-btn waves-effect waves-light level cyan darken-3" type="submit" data-value='3'>3x3</button>
			    			<button id='4x4' class="btn-floating size-btn waves-effect waves-light level purple darken-3" type="submit" data-value='4'>4x4</button>
			    			<button id='5x5' class="btn-floating size-btn waves-effect waves-light level pink darken-3" type="submit" data-value='5'>5x5</button>
			    			<button id="start" class="btn menu waves-effect waves-light start teal darken-1 hidden" type="submit" name="start">Start</button>
			    			<button id="cancel" class="btn menu waves-effect waves-light pink darken-3 cancel hidden" type="submit" name="start">Cancel</button>
			    			<button id="reset" class="btn menu waves-effect waves-light deep-orange lighten-1 hidden" type="submit" name="reset">Reset</button>
			    			<button id="quit" class="btn menu waves-effect waves-light pink darken-3 restart hidden" type="submit" name="quit">Quit</button>
			    			<button id="newGame" class="btn menu waves-effect waves-light cyan darken-3 hidden" type="submit" name="newGame">New Game</button>
		    			</div>
	    			</div>
	    		</div>
                <div id="how-to-play" class="center-align hide-on-small-only">
                    <a href="{{{ action('HomeController@showHome') }}}#about" class="how-to">How to Play</a>
                </div>
			</div>
    		<div class="col s12 m7 l5">
    			<div class="card-panel blue-grey lighten-5 z-depth-2">
	    			<div id='gameBoard' data-size="{{{ $size }}}">
	    				<img id='chooseLevel' class="hidden" src="/img/ninja_placeholder.jpg">
    					<img id='whenReady' class="hidden" src="/img/ninja_placeholder_start.jpg">
	    			</div>
	    			<div id='playSameGame' data-positions="{{{ $initialPositions }}}"></div>
	    			<div id='puzzle_id' data-id="{{{ $id }}}"></div>
    			</div>
                <div id="how-to-play" class="center-align hide-on-med-and-up">
                    <a href="{{{ action('HomeController@showHome') }}}#about" class="how-to">How to Play</a>
                </div>
    		</div>
    	</div>
    </div>
	{{ Form::token() }}

	<!-- Modal Structure -->
	<div id="win-modal" class="modal game-modal">
		<div class="modal-content game-modal-content center-align">
			<div class="close-x">
				<button class="modal-action modal-close blue-grey-text text-lighten-2 btn-flat waves-effect waves-light"><i class="mdi-navigation-close"></i></button>
			</div>
			<h2 class="white-text you-win">You win!</h2>
		</div>
	</div>
@stop


@section('game-script')
    <script src="/js/game.js"></script>
@stop

