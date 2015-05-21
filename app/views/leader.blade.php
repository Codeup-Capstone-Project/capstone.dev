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
					<li class="sort sort-time" data-sort="listGameTime">Sort by Time</li>
					<li class="sort" data-sort="listMoves">Sort by Moves</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				<ol class="list collection white custom">  {{-- style="border:1px solid #ddd;" --}}
					@foreach($stats as $stat)
							@if($stat->puzzle->size == $size)
								<li class='collection-item leader-item'>
									<div class="row no-marg-bot">
										<div class="col s12 l4">
											<img class="profile-avatar circle" src="{{{ $stat->user->profile_photo_url }}}">
											<h6 class="listUsername medium user-title">{{{ $stat->user->username }}}</h6>
										</div>
										<div class="col s12 l4 user-info-col">
											<p class="teal-text text-darken-1">Random Puzzle #<span class="puzzleNumber">{{{ $stat->puzzle->id }}}<span></p>
											<p class="grey-text text-darken-1">Finished in: <span class="listGameTime blue-grey-text">{{{ $stat->game_time }}}</span></p>
											<p class="grey-text text-darken-1">With: <span class="listMoves blue-grey-text">{{{ $stat->moves }}} moves</span></p>
										</div>
										<div class="col s12 l4">
											<p class="grey-text text-lighten-1 updated-at">{{{ $stat->updated_at }}}</p>
										</div>
									</div>
									<div class="row pad-top">
										<div class="col s12">
											<a class="btn" href="{{{ action('GameController@getGame', $stat->puzzle->id) }}}">Play Same Puzzle</a>
										</div>
									</div>
								</li>
							@endif
					@endforeach
				</ol>
			</div>
		</div>
	</div> {{-- end main column --}}
</div> {{-- end main row --}}

{{-- grey lighten-5 for background color of modal--}}



