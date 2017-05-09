@extends('layouts.hoteladmin')

@section('title', 'iHotel')

@section('content')
@include('profile.hotel.partials.header')
<div class="main-page">
	<div class="admin-header">
		<div class="admin-body">
			<div class="ui fluid stackable container">
				<div class="ui stackable column grid">
					<div class="sixteen wide column">
						<div id="context1">
							@include('profile.hotel.partials.menu')
							<div class="ui segment com-service">
								<div class="ui stackable grid search-form">
									<div class="eight wide column">{{ date('Y-m-d') }}
										<h4 class="ui header">Захиалгын мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="sixteen wide column">
									<div class="ui segment">
										<table class="ui celled padded table">
											<tbody>
												<tr>
													<td>Захиалагчийн нэр</td>
													<td>{{ $order->user->name }}</td>
												</tr>
												<tr>
													<td>Захиалагчийн и-мэйл</td>
													<td>{{ $order->user->email }}</td>
												</tr>
												<tr>
													<td>Буудлын нэр</td>
													<td>{{ $order->hotel_name }}</td>
												</tr>
												<tr>
													<td>Захиалсан өдөр</td>
													<td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
												</tr>
												<tr>
													<td>Ирэх өдөр</td>
													<td>{{ $order->startdate }}</td>
												</tr>
												<tr>
													<td>Гарах өдөр</td>
													<td>{{ $order->enddate }}</td>
												</tr>
												@if (unserialize($order->pickup))
													<tr>
														<td>Онгоцны буудлаас тосох</td>
														<td>{{ unserialize($order->pickup)['name'] }}</td>
													</tr>
												@endif
												<tr>
													<td>Хоног</td>
													<td>{{ $order->day }}</td>
												</tr>
												<tr>
													<td>Нийт үнэ</td>
													<td>
														@if ($order->price_dollar)
															{{ number_format($order->price_dollar) }}$
														@else
															{{ number_format($order->price) }}₮
														@endif
													</td>
												</tr>
												<tr>
													<td>Төлөв</td>
													<td>
														@if ($order->status == 1)
															<span class="ui teal label">Баталгаажаагүй</span>
														@elseif ($order->status == 2)
															<span class="ui green label">Баталгаажсан</span>
														@elseif ($order->status == 3)
															<span class="ui red label">Цуцлагдсан</span>
														@endif
													</td>
												</tr>
											</tbody>
										</table>
										<h4 class="ui header">Захиалсан өрөөнүүд</h4>
										<div class="ui divider"></div>
										<table class="ui celled padded table">
											<thead>
												<tr>
													<th>Өрөө</th>
													<th>Өрөөний тоо</th>
													<th>Өрөөний үнэ/хоног</th>
												</tr>
											</thead>
											<tbody>
												@foreach (unserialize($order->rooms) as $room)
													<tr>
														<td>{{ $room['room_name'] }}</td>
														<td>{{ $room['room_number'] }}</td>
														@if ($order->price_dollar)
															<td>{{ number_format($room['room_price']) }}$</td>
														@else
															<td>{{ number_format($room['room_price']) }}₮</td>
														@endif
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection