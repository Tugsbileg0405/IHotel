@if ($comments->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>Нийтлэлийн гарчиг</th>
				<th>Агуулга</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($comments as $comment)
				<tr>
					<td>{{ $comment->id }}</td>
					<td>{{ $comment->user->name }}</td>
					<td>{{ $comment->post->title }}</td>
					<td>{{ $comment->content }}</td>
					<td>
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