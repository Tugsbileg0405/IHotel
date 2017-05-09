@if ($orders->count() > 0)
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Захиалгын дугаар </th>
				<th>Захиалсан өдөр</th>
				<th>Хүсэлт </th>
				<th>Захиалагчийн нэр</th>
				<th>Зочны нэр</th>
				<th>Ирэх өдөр</th>
				<th>Гарах өдөр</th>
				<th>Нийт төлбөр</th>
				<th>Бодогдох хувь</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $key => $order)
				<tr {{ $key%2 == 0 ? 'class=ihotel-blue' : '' }}>
					<td class="collapsing">
						<h5 class="ui header">2</h5>
					</td>
					<td class="user-id">{{ $order->number }}</td>
					<td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
					<td>Бид</td>
					<td>{{ $order->user->name }}</td>
					<td>{{ $order->user->name }}</td>
					<td>{{ $order->startdate }}</td>
					<td>{{ $order->enddate }}</td>
					<td>{{ $order->price }}</td>
					<td>{{ $order->price*0.1 }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $orders->links() }}
@else
	<div class="ui segment">
		<p>Захиалга олдсонгүй.</p>
	</div>
@endif