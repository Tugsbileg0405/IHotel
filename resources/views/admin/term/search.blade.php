@if ($terms->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Гарчиг</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($terms as $term)
				<tr>
					<td>{{ $term->id }}</td>
					<td>{{ $term->title }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/term/'.$term->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $term->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $terms->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif