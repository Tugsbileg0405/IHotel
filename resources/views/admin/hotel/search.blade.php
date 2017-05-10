@if ($hotels->count() > 0)	
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>Ангилал</th>
				<th>Өрөөний тоо</th>
				<th>Од</th>
				<th>Эрэмбэ</th>
				<th>Идэвхитэй эсэх</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($hotels as $key => $hotel)
				<tr>
					<td>{{ $hotel->id }}</td>
					<td>{{ $hotel->name }}</td>
					<td>{{ $hotel->category->name }}</td>
					<td>{{ $hotel->room_number }}</td>
					<td>
						@for ($i=0; $i<$hotel->star; $i++)
							<i class="icon yellow star"></i>
						@endfor
					</td>
					<td>{{ $hotel->priority }}</td>
					<td>{{ $hotel->is_active ? 'Тийм' : 'Үгүй' }}</td>
					<td>
						<a class="ui icon button open-EditModal" data-key="{{ $key }}">
							<i class="pencil icon"></i>
						</a>
					</td>
					<td>
						<a class="ui icon button open-DeleteModal" data-id="{{ $hotel->id }}">
							<i class="trash icon"></i>
						</a>
					</td>
					<td>
						<a class="ui icon button" href="{{ url('admin/hotel', $hotel->id) }}">
							<i class="eye icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $hotels->links() }}
@else
	Илэрц олдсонгүй
@endif