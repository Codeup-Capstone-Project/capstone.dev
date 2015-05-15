<html>
<head>
	<title>Puzzle Test</title>
	<meta name="_token" content="{{ csrf_token() }}" />
	<script src="/js/vendor/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<style>
		.hidden {
			display: none;
		}

		#gameBoard {
			box-sizing: border-box;
			/*border: 1px solid black;*/
			width: 100%;
			position: relative;
			overflow: visible;
			box-shadow: 8px 8px 30px 3px rgba(0,0,0,0.75);
				-webkit-box-shadow: 8px 8px 30px 3px rgba(0,0,0,0.75);
				-moz-box-shadow: 8px 8px 30px 3px rgba(0,0,0,0.75);
		}

		.blocks {
			box-sizing: border-box;
			background-color: #ddd;
			margin: 1px;
			position: absolute;
			display: inline-block;
			/*line-height: 100px;*/
  			vertical-align: middle;
  			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
    	<div class="row">
		    <div class="col s12 l6">	
		    	<div class="row">
		    		<div class="col s12 l12">
		    			<h3 class="level">Choose Difficulty Level</h3>
		    			<button id='3x3' class="btn waves-effect waves-light level" type="submit" data-value='3'>3x3</button>
		    			<button id='4x4' class="btn waves-effect waves-light yellow lighten-2 level" type="submit" data-value='4'>4x4</button>
		    			<button id='5x5' class="btn waves-effect waves-light red lighten-2 level" type="submit" data-value='5'>5x5</button>
		    			<button id='easy' class="btn waves-effect waves-light blue lighten-2 level" type="submit" data-value='3'>Super Easy</button>
		    			<button id="start" class="btn waves-effect waves-light start hidden" type="submit" name="start">Start</button>
		    			<button id="reset" class="btn waves-effect waves-light yellow lighten-2 hidden" type="submit" name="reset">Reset</button>
		    			<button id="quit" class="btn waves-effect waves-light red lighten-2 restart hidden" type="submit" name="quit">Quit</button>
		    			<button id="newGame" class="btn waves-effect waves-light blue lighten-2 hidden" type="submit" name="newGame">New Game</button>
			    		<div>
			    			<h3 id="moves">Moves: 0</h3>
			    		</div>
		    		</div>
		    	</div>
		    	<div class="row">
		    		<h1 id="timer"><time>00:00:00:00</time></h1>
		    	</div>
			</div>
    		<div class="col s12 l6">
    			<div id='gameBoard'></div>
    		</div>
    	</div> 
    </div>
	{{ Form::token() }}
    <script src="/js/game.js"></script>
</body>
</html>