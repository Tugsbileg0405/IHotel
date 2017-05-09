@if ($categories->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/hotelservicecategory/'.$category->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="{{ $category->id }}">
							<i class="trash icon"></i>
						</a>
						<a class="ui icon button" href="{{ url('profile/hotelservice', $category->id) }}">
							<i class="settings icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $categories->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif