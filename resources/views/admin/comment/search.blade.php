@if ($comments->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>Тайлбар</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($comments as $comment)
				<tr>
					<td>{{ $comment->id }}</td>
					<td>{{ $comment->name }}</td>
					<td>{{ $comment->description }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/comment/'.$comment->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $comment->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $comments->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif