@if ($informations->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($informations as $information)
				<tr>
					<td>{{ $information->id }}</td>
					<td>{{ $information->title }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/information/'.$information->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $information->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $informations->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif