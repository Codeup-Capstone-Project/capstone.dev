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
    <script>
		$.ajaxSetup({
	        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')}
	    });
	    
    	$(document).ready(function(){

    	//================ Determine GameBoard Dimensions ===============
    		//get gameBoard width on page load
    		var boardWidth = $("#gameBoard").innerWidth();
    		//set gameBoard height to same as width, then retrieve it
    		var boardHeight = $("#gameBoard").innerHeight(boardWidth);
    			boardHeight = $("#gameBoard").innerHeight();

    	//====================== Begin Game =========================

    		var puzzleId;
    		var puzzleSize;		//determined by user game-level selection
    		var emptyCell;		//the index number of the empty cell in the position array
    		var cellX = 0;		//initial x-coordinate of top-left corner of cell, relative to the gameBoard container div
    		var cellY = 0;		//initial y-coordinate of top-left corner of cell, relative to the gameBoard container div
    		var cells = [];		//array to hold cell coordinates
    		var moves = 0;
    		var cellDimension;	//determined by size of gameBoard and puzzleSize for mobile-responsiveness
    		var cellPadding = 2;
    		var totalBlocks;
    		var initialBlockPositions = [];	//will be randomly generated
    		var newBlockPositions = [];		//will be a clone of initial positions that changes as user clicks blocks
    		var answerKey = [1,2,3,4,5,6,7,8,0];

    		//object to POST necessary game data to database when game ends
    		var gameStats = {
    			"initialBlockPositions": initialBlockPositions
    		};


	    //====================== Buttons =========================

	    	// Level Selection Buttons that reset key variables
	    	$(".level").on('click', function(){
	    		$(".blocks").remove();
	    		puzzleSize = $(this).data('value');
	    		setBlockDimensions();
	    		totalBlocks = puzzleSize * puzzleSize;
	    		cells = [];
	    		initialBlockPositions = [];
	    		randomPositionGenerator();
	    		postInitialData();
	    		$(".level").addClass('hidden');
    			$("#start").removeClass('hidden');
	    	});

	    	// Easy Level Button for Demo-day
	    	$("#easy").on('click', function(){
	    		$(".blocks").remove();
	    	});


	    	// Start game button
	    	$("#start").on('click', function(){
	    		$(".blocks").remove();
	    		buildGameBoard();
	    		timer();
	    		startGame();
	    	});

	    	// Reset game button
	    	$("#reset").on('click', function(){
	    		clearTimeout(t);
	    		milliseconds = 0; seconds = 0; minutes = 0; hours = 0;
	    		$("#timer").text("00:00:00:00");
	    		timer();
	    		startGame();
	    	});

	    	// Quit game button
	    	$("#quit").on('click', function(){
	    		clearTimeout(t);
	    		var won = false;
	    		endGame(won);
	    	});

	    	// New game button
	    	$("#newGame").on('click', function(){
	    		milliseconds = 0, seconds = 0, minutes = 0, hours = 0;
	    		$("#timer").text("00:00:00:00");
	    		$(".blocks").remove();
	    		$(".btn").addClass('hidden');
	    		$(".level").removeClass('hidden');
	    	});


	    //====================== Game Logic Functions =========================

	    	function setBlockDimensions()
	    	{
	    		//set individual block dimensions
    			var blockWidth = (boardWidth - (2 * puzzleSize)) / puzzleSize;
    			cellDimension = blockWidth;
	    	}

	    	function randomPositionGenerator()
	    	{
	    		//fill the array with an integer for every block
	    		for (i = 0; i < totalBlocks; i++) {
	    			initialBlockPositions[i] = i;
	    		} 
	    		//shuffle the array
			  	var tmp, current, top = initialBlockPositions.length;
			  	if(top) while(--top) {
				    current = Math.floor(Math.random() * (top + 1));
				    tmp = initialBlockPositions[current];
				    initialBlockPositions[current] = initialBlockPositions[top];
				    initialBlockPositions[top] = tmp;
				}
	    	}

	    	function postInitialData()
	    	{
	    		//object to POST necessary game info to database
	    		var puzzleInfo = {
	    			"size" : puzzleSize,
	    			"type" : puzzleSize+"x"+puzzleSize,
	    			"initialBlockPositions": initialBlockPositions
	    		};
	    		//send puzzleInfo to puzzle table in database
    			$.post('/play/puzzle', puzzleInfo, function(response){
    				puzzleId = response;
    				gameStats.puzzle_id = puzzleId;
    			});
	    	}


	    	// Create gameboard grid of cells
    		function buildGameBoard()
    		{
    			cellX = 0;
    			cellY = 0;
	    		// Loop for determining cell positions
		    	for(var i = 0; i < totalBlocks; i++) {
		    		//store coordinates of each cell
		    		cells[i] = [cellX, cellY];
		    		// $('#gameBoard').append("<div class='cells' style='top:"+cellY+";left:"+cellX+"'></div>");
		    		//increase the x-coordinate based on the size of each cell
		    		cellX += cellDimension + cellPadding;
		    		//reset the x-coordinate and increase the y-coordinate after the last cell of each row is positioned
		    		if ((i+1) % puzzleSize == 0) {
		    			cellX = 0;
		    			cellY += cellDimension + cellPadding;
		    		}
		    	}
		    }


	    	function startGame(){
	    		moves = 0;
	    		$("#moves").text("Moves: " + moves);
	    		positionBlocks();		//place blocks in their initial positions
	    		newBlockPositions = initialBlockPositions.slice(0);	//create a clone of the initial positions array to track block movements
	    		gameStats.newBlockPositions = newBlockPositions;
	    		identifyMovableBlocks();
	    		$("#start").addClass('hidden');
	    		$("#newGame").addClass('hidden');
	    		$("#quit").removeClass('hidden');
	    		$("#reset").removeClass('hidden');
	    	}

	    	// Loop through cell-position array and assign its sets of coordinates to each block as they are generated
	    	function positionBlocks()
	    	{
	    		$.each(cells, function(index, coordinates) {
  					//concurrently loop through block-positions-array and store their numeric value
  					var blockNumber = initialBlockPositions[index];
  					//a block number of 0 indicates the initial empty cell's position
  					if(blockNumber == 0){
						emptyCell = index;
  					} else{	
  						//generate the div for each block using the coordinates from each element of the cell's array, 
  						//attach their numeric value to them visually and via the data attribute
  						$('#gameBoard').append("<div class='blocks z-depth-3' data-blocknum='"+blockNumber+"' style='top:"+coordinates[1]+"px;left:"+coordinates[0]+"px;line-height:"+cellDimension+"px;'>"+blockNumber+"</div>");
  					}
				});
				$(".blocks").innerWidth(cellDimension);
    			$(".blocks").innerHeight(cellDimension);
	    	}


	    	function identifyMovableBlocks()	
	    	{
				var c = emptyCell;
				var s = puzzleSize;

				//identify the indices of cells adjacent to the empty cell	    		
				switch (c % s) {
					//if emptyCell is along right-side of gameboard
					case s - 1:
						var movableCells = [c-1, c+s, c-s];
						break;
					//if emptyCell is along left-side of gameboard 
					case 0:
						var movableCells = [c+1, c+s, c-s];
						break;
					default:
						var movableCells = [c+1, c-1, c+s, c-s];
						break;
				}

					//attach click-event listener to adjacent blocks
					$.each(movableCells, function(index, cell) {
						//only use cells that are within the totalBlocks range: 1--9, 1--16, etc.
						if(!(cell < 0) && !(cell > totalBlocks)){
							var movableBlock = newBlockPositions[cell];
							addEventListeners(movableBlock);
						}
					});

			}


	    	function addEventListeners(movableBlock){
	    		$('.blocks[data-blocknum="'+ movableBlock +'"').on('click', function(){
	    			//call moves-counter
	    			movesCounter();

	    			//fetch the block number of clicked block via its data attribute
					var blockNumber = parseInt($(this).data("blocknum"));

					//fetch the index number of that block from its position array 
					//it will become the next empty cell
					clickedPositionIndex = $.inArray(blockNumber, newBlockPositions);
					
					//swap values between the clicked block and the old empty cell and update gameStats object
					newBlockPositions[emptyCell] = blockNumber;
					newBlockPositions[clickedPositionIndex] = 0;
					gameStats.newBlockPositions = newBlockPositions;
	    			
	    			//animate the block moving to its new xy-coordinates
	    			//3rd parameter calls removeEventListeners() upon completion of animation
	    			$(this).animate({ "top": cells[emptyCell][1], "left": cells[emptyCell][0] }, "fast", removeEventListeners);
	    			// Reset global emptyCell index variable to the index of the clicked block
	    			emptyCell = clickedPositionIndex;
	    		});
	    	}


	    	function removeEventListeners(){
	    		//after each move, check against answer key to alert when player has won
    			if(newBlockPositions.toString() == answerKey.toString()){
    				$('.blocks').off();
    				var won = true;
    				endGame(won);
    				return;
    			}
    			$('.blocks').off();
	    		identifyMovableBlocks();
	    	}

	    	function movesCounter()
	    	{
	    		moves += 1;
	    		$("#moves").text("Moves: " + moves);
	    	}

	    	function endGame(won){
	    		var time = $("#timer").text();
	    		gameStats.gameFinished = won;
	    		gameStats.time = time;
	    		gameStats.moves = moves;
	    		$("#quit").addClass('hidden');
		    	$("#newGame").removeClass('hidden');
		    	if(won){
		    		alert("You win");
		    	}
		    	$.post('/play/stats', gameStats);
	    	}


		//====================== Game Timer ========================= 

		var milliseconds = 0, seconds = 0, minutes = 0, hours = 0,
		    t;

		function add() {
			milliseconds++;
			if (milliseconds >= 100) {
			    milliseconds = 0;
			    seconds++;
			    if (seconds >= 60) {
			        seconds = 0;
			        minutes++;
			        if (minutes >= 60) {
			            minutes = 0;
			            hours++;
			        }
			    }
			}
		    // var timerDisplay = 
		    $("#timer").text((hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds ? (seconds > 9 ? seconds : "0" + seconds) : "00") + ":" + (milliseconds > 9 ? milliseconds : "0" + milliseconds));

		    timer();
		}
		function timer() {
		    t = setTimeout(add, 10);
		}
		// timer();


		/* Start button */
		// start.onclick = timer;

		/* Stop button */
		// stop.onclick = function() {
		//     clearTimeout(t);
		// }


	    	
		});
    </script>
</body>
</html>