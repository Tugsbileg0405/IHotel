@if ($teams->count() > 0)
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
			@foreach ($teams as $team)
				<tr>
					<td>{{ $team->id }}</td>
					<td>{{ $team->name }}</td>
					<td>{{ $team->description }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/team/'.$team->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $team->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $teams->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif