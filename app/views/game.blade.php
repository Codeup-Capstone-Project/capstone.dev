/vagrant/sites/capstone.dev/app/views/game.blade.php

<html>
<head>
	<title>Puzzle Test</title>
	<script src="/js/vendor/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<style>
		#gameBoard {
			border: 1px solid black;
			width: 308px;
			height: 308px;
			position: relative;
			overflow: visible;
		}

		.blocks {
			background-color: #ddd;
			width: 100px;
			height: 100px;
			margin: 1px;
			position: absolute;
			display: inline-block;
			/*float: left;*/
		}
	</style>
</head>
<body>
	<div class="container">
    	<div class="row">
    		<div class="col s6 l6 offset-s3 offset-l3">
    			<div id='gameBoard'>

    			</div>
    			<button id="start">Start</button>
    		</div>
    	</div>    
    </div>

    <script>
    	
    	$(document).ready(function(){
    		var emptyCell;		//the index number of the empty cell in the position array
    		var cellX = 0;		//initial x-coordinate of top-left corner of cell, relative to the gameBoard container div
    		var cellY = 0;		//initial y-coordinate of top-left corner of cell, relative to the gameBoard container div
    		var cells = [];		//array to hold cell coordinates
    		var cellDimension = 100;	//will be a percentage for mobile-responsiveness
    		var cellPadding = 2;
    		var puzzleSize = 3;		//will be an AJAX call to database activated on user game-level selection?
    		var puzzleDimensions = puzzleSize * puzzleSize;
    		var initialBlockPositions = [5,4,3,2,1,0,6,7,8];	//will be randomly generated later
    		var answerKey = [1,2,3,4,5,6,7,8,0]

    		// Create gameboard grid of cells
    		// Loop for determining cell positions
	    	for(var i = 0; i < puzzleDimensions; i++) {
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


	    	// Start game button
	    	$("#start").on('click',positionBlocks);


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

				addEventListeners();
	    	}

	    	function addEventListeners()
	    	{
				var c = emptyCell;
				var s = puzzleSize;

				//identify the cells adjacent to the empty cell	    		
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

					console.log('movableCells indices array: ' + movableCells);

					//only attach click-event listener to adjacent blocks
					$.each(movableCells, function(index, value) {
						if(!value < 0 && !value > puzzleDimensions){

						}
					});

		    		$('.blocks').on('click', function(){
		    			console.log("Old Empty: "+emptyCell);

		    			//fetch the block number of clicked block via its data attribute
						blockNumber = parseInt($(this).data("blocknum"));
						console.log('Block Clicked: '+blockNumber);

						//fetch the index number of that block from its position array 
						//it will become the next empty cell
						clickedPositionIndex = $.inArray(blockNumber, initialBlockPositions);
						//swap values between the clicked block and the old empty cell
						initialBlockPositions[emptyCell] = blockNumber;
						initialBlockPositions[clickedPositionIndex] = 0;
						//console.log(initialBlockPositions);
		    			
		    			//animate the block moving to its new xy-coordinates
		    			$(this).animate({ "top": cells[emptyCell][1], "left": cells[emptyCell][0] }, "fast" );
		    			// Reset global emptyCell index variable to the index of the clicked block
		    			emptyCell = clickedPositionIndex;
		    			
		    			console.log(initialBlockPositions);
		    			//console.log("Clicked Cell: "+clickedPositionIndex);

		    			//after each move, check against to answer key to alert when player has won
		    			if(initialBlockPositions.toString() == answerKey.toString()){
		    				alert("you win!");
		    			}
		    		});
	    	}


	    	

		});

    </script>
</body>
</html>