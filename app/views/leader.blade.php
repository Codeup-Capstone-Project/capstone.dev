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
	<input class="search" placeholder="Search Rankings" />
	<button class="btn sort" data-sort="listGameTime">Sort by Best Time</button>
	<button class="btn sort" data-sort="listMoves">Sort by Least Moves</button>

	{{-- Pagination Links --}}
	<div>
		{{-- {{ $stats->links() }} --}}
	</div>
	<ul class="list collection">
		<?php $count = 0; ?>
		@foreach($stats as $stat) 
				@if($stat->puzzle->size == $size)
					<li class='row collection-item avatar valign-wrapper'>
						<div class="col s1 m1">
							<h4>{{{ ++$count }}}</h4>
						</div>
						<div class="col s1 m1">
							<h5 class="right-align"><img class="userAvatar" src="/img/jamie.jpg" class="circle"></h5>
						</div>
						<div class='col s12 m4'>
							<h5 class="listUsername">{{{ $stat->user->username }}}</h5>
							<p>Puzzle# <span class="puzzleNumber">{{{ $stat->puzzle->id }}}<span></p>
							<p class="listGameTime">Finished in: {{{ $stat->game_time }}} </p>
							<p class="listMoves">With: {{{ $stat->moves }}} moves</p>
							<p>{{{ $stat->updated_at }}}</p>
						</div>
						<div class="col s12 m6 center">
							<button type="button" class="btn directToPuzzle" data-value="{{{ $stat->puzzle->id }}}">Play Same Puzzle</button>
						</div>
					</li>
				@endif
		@endforeach
	</ul>
	{{-- Pagination Links --}}
	<div>
		{{-- {{ $stats->links() }} --}}
	</div>
</div>

