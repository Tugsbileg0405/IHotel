@if ($services->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($services as $service)
				<tr>
					<td>{{ $service->id }}</td>
					<td>{{ $service->name }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/hotelservice/'.$service->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $service->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $services->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif