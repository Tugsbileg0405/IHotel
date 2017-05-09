@if ($users->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>И-мэйл</th>
				<th>Эрх</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if ($user->isAdmin())
							Админ
						@else 
							Хэрэглэгч
						@endif
					</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/user/'.$user->id.'/edit') }}">
							<i class="pencil icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}
@else
	<p>Илэрц олдсонгүй</p>
@endif