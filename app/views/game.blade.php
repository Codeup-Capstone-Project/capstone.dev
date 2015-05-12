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
    	// Create canvas grid
    	$(document).ready(function(){
    		var emptyCell;
    		var cellX = 0;
    		var cellY = 0;
    		var cells = [];
    		var cellDimension = 100;
    		var cellPadding = 2;
    		var puzzleSize = 3;
    		var puzzleDimensions = puzzleSize * puzzleSize;
    		var puzzlePositions = [5,4,3,2,1,0,6,7,8];	//will be randomly generated later
    		var puzzleAnswerKey = [1,2,3,4,5,6,7,8,0]

    		//Loop for determining cell positions
	    	for(var i = 0; i < puzzleDimensions; i++) {
	    		cells[i] = [cellX, cellY];

	    		// $('#gameBoard').append("<div class='cells' style='top:"+cellY+";left:"+cellX+"'></div>");
	    		
	    		cellX += cellDimension + cellPadding;

	    		if ((i+1) % puzzleSize == 0) {
	    			cellX = 0;
	    			cellY += cellDimension + cellPadding;
	    		}
	    	}

	    	
	    	function positionBlocks()
	    	{
	    		$.each(cells, function(index, coordinates) {
  					var blockNumber = puzzlePositions[index];
  					if(blockNumber == 0){
						emptyCell = index;
  					} else{	
  						$('#gameBoard').append("<div class='blocks' data-blocknum='"+blockNumber+"' style='top:"+coordinates[1]+";left:"+coordinates[0]+"'>"+blockNumber+"</div>");
  					}
				});
				addEventListeners();
	    	}

	    	function addEventListeners()
	    	{
	    		$('.blocks').on('click', function(){
	    			console.log("Old Empty:"+emptyCell);

	    			//fetch the block number of clicked block
					blockNumber = parseInt($(this).data("blocknum"));
					console.log('Block Clicked'+blockNumber);

					//fetch the index number of that block in the its position array (it will become the next empty cell)
					clickedBlockPosition = $.inArray(blockNumber, puzzlePositions);
					//swap values between the clicked block and old empty space
					puzzlePositions[emptyCell] = blockNumber;
					puzzlePositions[clickedBlockPosition] = 0;
					//console.log(puzzlePositions);
	    			
	    			$(this).animate({ "top": cells[emptyCell][1], "left": cells[emptyCell][0] }, "fast" );
	    			// Reset global emptyCell position variable to cell that was just clicked
	    			emptyCell = clickedBlockPosition;
	    			
	    			console.log(puzzlePositions);
	    			//console.log("Clicked Cell:"+clickedBlockPosition);

	    			if(puzzlePositions.toString() == puzzleAnswerKey.toString()){
	    				alert("you win!");
	    			}
	    		});
	    	}


	    	// Start game button
	    	$("#start").on('click',positionBlocks);

	    	

		});

    </script>
</body>
</html>