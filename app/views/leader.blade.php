{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script> --}}
<script>
	$(document).ready(function(){
		//================== List.JS API Library ===================
		var options = {
		  valueNames: [ 'listGameTime', 'listMoves', 'listUsername', 'puzzleNumber' ]
		};

		var statsList = new List('statsList', options).on('sortComplete', function(){
			reRank();
		});

		// Resets the ranking numbers everytime the sorting options are clicked
		function reRank()
        {
            $('.ranking').each(function(index, value){
                var newRanking = index + 1;
                $(this).html(newRanking);
            });
        }

        // WIP: Orders & highlights the sorting option that is currently active
        $(".sort-time").on('click', function()
        {
        	statsList.sort('listGameTime', { order: "asc" });
        	$(".sortx").removeClass('active');
        	$(this).addClass('active');
        });

        $(".sort-moves").on('click', function()
        {
        	statsList.sort('listMoves', { order: "asc" });
        	$(".sortx").removeClass('active');
        	$(this).addClass('active');
        });

     //    // Orders and highlights the sorting option that is currently active
     //    $(".sort-time").on('click', function()
     //    {
     //    	//get the size of the leader board that is currently loaded and reload it
     //    	var size = $("#statsList").data('size');
     //    	$.get('/play/leaders/'+size, null, array(
     //    		function(data){
     //                $("#leaderModalContent").html(data);
     //            }, sortTime())
     //    	);
     //    });

     //    //sort according to best time
    	// function sortTime(){
     //    	statsList.sort('listGameTime', { order: "asc" });
     //    	$(".sortx").removeClass('active');
     //    	$("#byTime").addClass('active');
     //    }
        
     //    $(".sort-moves").on('click', function()
     //    {
     //    	//get the size of the leader board that is currently loaded and reload it
     //    	var size = $("#statsList").data('size');
     //    	$.get('/play/leaders/'+size, null, function(data){
     //                $("#leaderModalContent").html(data);
     //                sortMoves();
     //            });
     //    });

     //    //sort according to least moves
     //    function sortMoves(){	
     //    	statsList.sort('listMoves', { order: "asc" });
     //    	$(".sortx").removeClass('active');
     //    	$("#byMoves").addClass('active');
     //    	alert("done");
     //    }

     // // Orders and highlights the sorting option that is currently active
     //    $(".sort-time").on('click', function()
     //    {
     //    	//get the size of the leader board that is currently loaded and reload it
     //    	var size = $("#statsList").data('size');
     //    	$.ajax({
     //    		url: '/play/leaders/'+size, 
     //    		data: null, 
     //    		type: "GET", 
     //    		success: function(data)
     //    		{
     //                $("#leaderModalContent").html(data);
     //            },
     //            complete: function(){
				 //        	statsList.sort('listGameTime', { order: "asc" });
				 //        	$(".sortx").removeClass('active');
				 //        	$("#byTime").addClass('active');
				 //        	alert('done');
				 //        }
     //    	});
     //    });
        
     //    $(".sort-moves").on('click', function()
     //    {
     //    	//get the size of the leader board that is currently loaded and reload it
     //    	var size = $("#statsList").data('size');
     //    	$.ajax({
     //    		url: '/play/leaders/'+size, 
     //    		data: null, 
     //    		type: "GET", 
     //    		success: function(data)
     //    		{
     //                $("#leaderModalContent").html(data);
     //            },
     //            complete: function(){	
				 //        	statsList.sort('listMoves', { order: "asc" });
				 //        	$(".sortx").removeClass('active');
				 //        	$("#byMoves").addClass('active');
				 //        	alert("done");
				 //        }
     //    	});
     //    });

	});


</script>

<div id="statsList" class="row" data-size="{{{ $size }}}"> {{-- start main row --}}
	<div class="col s12 m10 offset-m1 l8 offset-l2"> {{-- start main column --}}
		<div class="row no-marg-bot">
			<div class="col s12">
				<h4 class="blue-grey-text text-darken-2 leader-header">{{{ $size }}}x{{{ $size }}} Leader Board</h4>
			</div>
		</div>
		<div class="row no-marg-bot">
			<div class="col s12 m6">
				<input class="search" placeholder="Search Rankings" />
			</div>
			<div class="col s12 m6">
				<ul class="sort-buttons">
					<li id="byTime" class="sortx sort-time active" >Sort by Time</li>
					<li id="byMoves" class="sortx sort-moves" >Sort by Moves</li>
				</ul>
			</div>
		</div>

		<?php $count = 0; ?>

		<div class="row">
			<div class="col s12">
				<ul class="list collection white">  {{-- style="border:1px solid #ddd;" --}}
					@foreach($stats as $stat)
							@if($stat->puzzle->size == $size)
								<li class='collection-item leader-item custom'>
									<div class="ranking">
											{{{ ++$count }}}
									</div>
									<div class="row no-marg-bot">
										<div class="col s12 l4">
											<img class="profile-avatar" src="{{{ $stat->user->profile_photo_url }}}">
											<h6 class="listUsername medium user-title">{{{ $stat->user->username }}}</h6>
										</div>
										<div class="col s12 l4 user-info-col">
											<p class="teal-text text-darken-1">Random Puzzle #<span class="puzzleNumber">{{{ $stat->puzzle->id }}}<span></p>
											<p class="grey-text text-darken-1">Finished in: <span class="listGameTime blue-grey-text">{{{ $stat->game_time }}}</span></p>
											<p class="grey-text text-darken-1">With: <span class="listMoves blue-grey-text">{{{ $stat->moves }}} moves</span></p>
										</div>
										<div class="col s12 l4 updated-stat">
											<p class="grey-text text-lighten-1 updated-at">{{{ $stat->updated_at }}}</p>
										</div>
									</div>
									<div class="row pad-top">
										<div class="col s12 play-same">
											<a class="btn" href="{{{ action('GameController@getGame', $stat->puzzle->id) }}}">Play Same Puzzle</a>
										</div>
									</div>
								</li>
							@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div> {{-- end main column --}}
</div> {{-- end main row --}}

{{-- grey lighten-5 for background color of modal--}}



