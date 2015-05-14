<html>
<head>
	<title>Puzzle Test</title>
	<script src="/js/vendor/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/js/TimeCircles.js"></script>
	<link rel="stylesheet" href="/css/TimeCircles.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<style>
		.hidden {
			display: none;
		}
		button {
			text-align: center;
		}

		#gameBoard {
			border: 1px solid black;
			width: 308px;
			height: 308px;
			position: relative;
			margin-right: auto;
			margin-left: auto;
			overflow: visible;
			box-shadow: 8px 8px 30px 3px rgba(0,0,0,0.75);
				-webkit-box-shadow: 8px 8px 30px 3px rgba(0,0,0,0.75);
				-moz-box-shadow: 8px 8px 30px 3px rgba(0,0,0,0.75);
		}

		.blocks {
			background-color: #ddd;
			width: 100px;
			height: 100px;
			margin: 1px;
			position: absolute;
			display: inline-block;
			line-height: 100px;
  			vertical-align: middle;
  			text-align: center;
			/*float: left;*/
		}
	</style>
</head>
<body>
	<div class="container">
    	<div class="row">
    		<div class="col s6 l6 offset-s3 offset-l3">
    			<div id='gameBoard'></div>
    		</div>
    		<div class="col s3 l3">
    			<h3 class="level">Choose Difficulty Level</h3>
    			<button id='3x3' class="btn waves-effect waves-light level" type="submit" data-value='3'>3x3</button>
    			<button id='4x4' class="btn waves-effect waves-light yellow lighten-2 level" type="submit" data-value='4'>4x4</button>
    			<button id='5x5' class="btn waves-effect waves-light red lighten-2 level" type="submit" data-value='5'>5x5</button>
    		</div>
    	</div>  
    	<div class="row">
    		<div class="col s6 l6 offset-s3 offset-l3 center-align">
    			<button id="start" class="btn waves-effect waves-light start hidden" type="submit" name="start">Start</button>
    			<button id="reset" class="btn waves-effect waves-light yellow lighten-2 hidden" type="submit" name="reset">Reset</button>
    			<button id="quit" class="btn waves-effect waves-light red lighten-2 restart hidden" type="submit" name="quit">Quit</button>
    			<button id="newGame" class="btn waves-effect waves-light blue lighten-2 hidden" type="submit" name="newGame">New Game</button>
    		</div>
    	</div>
    	<div class="row">
    		<div id="timer" class="col s6 l6" data-date="" ></div>
    		<div>
    			<h3 id="moves">Moves: 0</h3>
    		</div>
    	</div>  
    </div>

    <script>

    	$(document).ready(function(){

    	//====================== Begin Game =========================

    		var emptyCell;		//the index number of the empty cell in the position array
    		var cellX = 0;		//initial x-coordinate of top-left corner of cell, relative to the gameBoard container div
    		var cellY = 0;		//initial y-coordinate of top-left corner of cell, relative to the gameBoard container div
    		var cells = [];		//array to hold cell coordinates
    		var moves = 0;
    		var cellDimension = 100;	//will be a percentage for mobile-responsiveness
    		var cellPadding = 2;
    		var puzzleSize;		//will be an AJAX call to database activated on user game-level selection?
    		var totalBlocks;
    		// var initialBlockPositions = [1,2,3,4,5,0,7,8,6];	//will be randomly generated later
    		var initialBlockPositions = [];
    		var newBlockPositions = [];		//will be a clone of initial positions that changes as user clicks blocks
    		var answerKey = [1,2,3,4,5,6,7,8,0];
    		
    		//objects to POST necessary game data to database
    		// var puzzleInfo = {
    		// 	"size" : puzzleSize,
    		// 	"type" : puzzleSize+"x"+puzzleSize,
    		// 	"initialBlockPositions": initialBlockPositions
    		// };
    		var gameStats = {
    			"initialBlockPositions": initialBlockPositions
    		};

    		// //send puzzleInfo to puzzle table in database
    		// $.post('/play/puzzle', puzzleInfo);


	    //====================== Buttons =========================
	    	// Level Selection Buttons
	    	$(".level").on('click', function(){
	    		puzzleSize = $(this).data('value');
	    		totalBlocks = puzzleSize * puzzleSize;
	    		randomPositionGenerator();
	    		postInitialData();
	    		$(".level").addClass('hidden');
    			$("#start").removeClass('hidden');
	    	});


	    	// Start game button
	    	$("#start").on('click', function(){
	    		$(".blocks").remove();
	    		buildGameBoard();
	    		startGame();
	    	});

	    	// Reset game button
	    	$("#reset").on('click', function(){
	    		$(".blocks").remove();
	    		$("#timer").TimeCircles().restart();
	    		$("#timer").TimeCircles().stop();
	    		startGame();
	    	});

	    	// Quit game button
	    	$("#quit").on('click', function(){
	    		var won = false;
	    		endGame(won);
	    	});

	    	// New game button
	    	$("#newGame").on('click', function(){
	    		//reload page with different version of same game using AJAX call?
	    		$(".blocks").remove();
	    		$(".btn").addClass('hidden');
	    		$(".level").removeClass('hidden');
	    	});


	    //====================== Game Logic Functions =========================

	    	function randomPositionGenerator()
	    	{
	    		//fill the array with integers
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
				console.log(initialBlockPositions);
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
    			$.post('/play/puzzle', puzzleInfo);
	    	}


	    	// Create gameboard grid of cells
    		function buildGameBoard()
    		{
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
	    		$("#timer").TimeCircles().start();
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
  						$('#gameBoard').append("<div class='blocks' data-blocknum='"+blockNumber+"' style='top:"+coordinates[1]+";left:"+coordinates[0]+"'>"+blockNumber+"</div>");
  					}
				});
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
	    		var time = $("#timer").TimeCircles().getTime();
	    		time *= -1;
	    		gameStats.gameFinished = won;
	    		gameStats.time = time;
	    		gameStats.moves = moves;
	    		$("#timer").TimeCircles().stop();
	    		$("#quit").addClass('hidden');
		    	$("#newGame").removeClass('hidden');
		    	if(won){
		    		alert("You win");
		    	}
		    	console.log(gameStats);
		    	$.post('/play/stats', gameStats);
	    	}


		//====================== Game Timer ========================= 
		//See documentation at http://git.wimbarelds.nl/TimeCircles/readme.php

	    	$("#timer").TimeCircles({
	    		"start": false,
			    "animation": "smooth",
			    "bg_width": 1.2,
			    "fg_width": 0.1,				
			    "circle_bg_color": "#60686F",	
			    "time": {
			        "Days": {
			            "text": "Days",
			            "color": "#FFCC66",
			            "show": false
			        },
			        "Hours": {
			            "text": "Hours",
			            "color": "#99CCFF",
			            "show": true
			        },
			        "Minutes": {
			            "text": "Minutes",
			            "color": "#BBFFBB",
			            "show": true
			        },
			        "Seconds": {
			            "text": "Seconds",
			            "color": "#FF9999",
			            "show": true
			        }
			    }
			});
		});
    </script>
</body>
</html>