@if ($questions->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Асуулт</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($questions as $question)
				<tr>
					<td>{{ $question->id }}</td>
					<td>{{ $question->question }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/question/'.$question->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $question->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $questions->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif