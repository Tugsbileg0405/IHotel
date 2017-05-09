@if ($posts->count() >0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Гарчиг</th>
				<th>Ангилал</th>
				<th>Нийтэлсэн</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->category->name }}</td>
					<td>{{ $post->user->name }}</td>
					<td>
						<a class="ui icon button open-DeleteModal" data-id="{{ $post->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $posts->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif