<h1>This is the Leader Board</h1>

	{{-- Pagination Links --}}
	<div>
		{{-- {{ $stats->links() }} --}}
	</div>

	@foreach($stats as $key => $stat)
		<div class='row'>
			<div class='col s12 m10'>
				<h3>{{{ $key + 1 }}}: {{{ $stat->user->username }}}</h3>
				<p>Finished in: {{{ $stat->game_time }}} </p>
				<p>With: {{{ $stat->moves }}} moves</p>
				<p>{{{ $stat->updated_at }}}</p>
			</div>
			<div class="col s12 m2">
				<button class="directToPuzzle">Play Same Puzzle</button>
			</div>
		</div>
	@endforeach

	{{-- Pagination Links --}}
	<div>
		{{-- {{ $stats->links() }} --}}
	</div>
