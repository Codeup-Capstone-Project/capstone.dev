{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script> --}}
<script>
	$(document).ready(function(){
		var options = {
		  valueNames: [ 'listGameTime', 'listMoves', 'listUsername', 'puzzleNumber' ]
		};

		var statsList = new List('statsList', options);
	});
</script>

<div id="statsList">
	<h4>{{{ $size }}}x{{{ $size }}} Leader Board</h4>
	
	<div class="row"> {{-- start main row --}}
	<div class="col s12 l8 offset-l2 "> {{-- start main column --}}
	
	<input class="search" style="height:36px;" placeholder="Search Rankings" />
	<button class="btn sort" data-sort="listGameTime">Sort by Time</button>
	<button class="btn sort" data-sort="listMoves">Sort by Moves</button>

	{{-- Pagination Links --}}
	<div>
		{{-- {{ $stats->links() }} --}}
	</div>
	<?php $count = 0; ?>
	<ul class="list collection">
		@foreach($stats as $stat) 
				@if($stat->puzzle->size == $size)
					<li class='row collection-item avatar'>
						<div class="col s1 m1 left-align">
							<h4 style="margin-top: 12.3px;">{{{ ++$count }}}</h4>
						</div>
						<div class="col s1 m1">
							{{-- <h5 class="right-align"> --}}
								<img class="userAvatar" src="/img/jamie.jpg">
							{{-- </h5> --}}
						</div>
						<div class="col s10 m10">
							<div class="row valign-wrapper">
								<div class='col s12 m4'>
									<h5 class="listUsername">{{{ $stat->user->username }}}</h5>
									<p>Puzzle# <span class="puzzleNumber">{{{ $stat->puzzle->id }}}<span></p>
									<p>Finished in: <span class="listGameTime">{{{ $stat->game_time }}}</span></p>
									<p>With: <span class="listMoves">{{{ $stat->moves }}} moves</span></p>
									<p>{{{ $stat->updated_at }}}</p>
								</div>
								<div class="col s12 m6 center">
									<button type="button" class="btn directToPuzzle" data-value="{{{ $stat->puzzle->id }}}">Play Same Puzzle</button>
								</div>
							</div>
						</div>
					</li>
				@endif
		@endforeach
	</ul>
	</div> {{-- end main column --}}
	</div> {{-- end main row --}}

	{{-- Pagination Links --}}
	<div>
		{{-- {{ $stats->links() }} --}}
	</div>
</div>

