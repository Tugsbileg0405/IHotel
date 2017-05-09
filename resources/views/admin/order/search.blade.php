@if ($orders->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Захиалагчийн нэр</th>
				<th>Буудлын нэр</th>
				<th>Ирэх өдөр</th>
				<th>Гарах өдөр</th>
				<th>Нийт үнэ</th>
				<th>Статус</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{ $order->number }}</td>
					<td>{{ $order->user->name }}</td>
					<td>{{ $order->hotel_name }}</td>
					<td>{{ $order->startdate }}</td>
					<td>{{ $order->enddate }}</td>
					<td>
						@if ($order->price_dollar)
							{{ number_format($order->price_dollar) }}$
						@else
							{{ number_format($order->price) }}₮
						@endif
					</td>
					<td>
						@if ($order->status == 1)
							<span class="ui teal label">Баталгаажаагүй</span>
						@elseif ($order->status == 2)
							<span class="ui green label">Баталгаажсан</span>
						@elseif ($order->status == 3)
							<span class="ui red label">Цуцлагдсан</span>
						@endif
					</td>
					<td>
						<a class="ui icon button" href="{{ url('profile/order/'.$order->id.'/edit') }}">
							<i class="eye icon"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $orders->links() }}
@else
	Илэрц олдсонгүй
@endif