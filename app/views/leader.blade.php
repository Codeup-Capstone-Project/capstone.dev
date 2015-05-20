{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script> --}}
<script>
	$(document).ready(function(){
		var options = {
		  valueNames: [ 'listGameTime', 'listMoves', 'listUsername', 'puzzleNumber' ]
		};

		var statsList = new List('statsList', options);
	});
</script>

<div id="statsList" class="row"> {{-- start main row --}}
	<div class="col s12 m8 offset-m2 l6 offset-l3"> {{-- start main column --}}
		<h4>{{{ $size }}}x{{{ $size }}} Leader Board</h4>
		<input class="search" placeholder="Search Rankings" />
		<button class="btn-flat sort" data-sort="listGameTime">Sort by Time</button>
		<button class="btn-flat sort" data-sort="listMoves">Sort by Moves</button>

		<?php $count = 0; ?>

		<ul class="list card-panel white">  {{-- style="border:1px solid #ddd;" --}}
			@foreach($stats as $stat)
					@if($stat->puzzle->size == $size)
						<li class='row no-marg-bot'>
							<div class="col s2 m1 left-align">
								<h4>{{{ ++$count }}}</h4>
							</div>
							<div class="col s3 m2 right-align">
									<img class="userAvatar" src="{{{ $stat->user->profile_photo_url }}}">
							</div>
							<div class="col s7 m9">
								<h5 class="listUsername medium">{{{ $stat->user->username }}}</h5>
								<p class="grey-text text-darken-1 no-marg">Puzzle# <span class="puzzleNumber">{{{ $stat->puzzle->id }}}<span></p>
								<p class="grey-text text-darken-1 no-marg">Finished in: <span class="listGameTime">{{{ $stat->game_time }}}</span></p>
								<p class="grey-text text-darken-1 no-marg">With: <span class="listMoves">{{{ $stat->moves }}} moves</span></p>
								<p class="grey-text text-lighten-1">{{{ $stat->updated_at }}}</p>
							</div>
							<div class="col s12 m12 l6 offset-l6 center">
								<a class="btn" href="{{{ action('GameController@getGame', $stat->puzzle->id) }}}">Play Same Puzzle</a>
							</div>
						</li>
						<div class="divider" style="margin-top:10px;"></div>
					@endif
			@endforeach
		</ul>
	</div> {{-- end main column --}}
</div> {{-- end main row --}}

{{-- grey lighten-5 for background color of modal--}}



