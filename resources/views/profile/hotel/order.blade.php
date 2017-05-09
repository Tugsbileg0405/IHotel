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
								<form class="ui form" id="order-search-form" action="{{ url('admin/hotel/order/search', $hotel->id) }}" method="POST">
									{{ csrf_field() }}
									<div class="ui stackable grid search-form">
										<div class="three wide column">{{ date('Y-m-d') }}
											<h4 class="ui header">Захиалгын мэдээлэл</h4>
										</div>
										<div class="four wide column">
											<div class="local example">
												<div class="ui search">
													<div class="ui fluid left icon input">
														<input class="prompt" type="text" name="name" placeholder="Хэрэглэгчийн нэр">
														<i class="user icon"></i>
													</div>
													<div class="results"></div>
												</div>
											</div>
										</div>
										<div class="three wide column select-room">
											<select class="ui fluid search dropdown" name="type">
												<option value="">Өдөр</option>
												<option value="1">Захиалсан өдөр</option>
												<option value="2">Ирэх өдөр</option>
												<option value="3">Гарах өдөр</option>
											</select>
										</div>
										<div class="four wide column">
											<div class="ui page stackable">
												<div class="ui fluid left icon input">
													<input type="text" name="reservation"
													id="reservation" placeholder="mm/dd/yyyy - mm/dd/yyyy"
													value=""/>
													<i class="calendar icon"></i>
												</div>
												<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
											</div>
										</div>
										<div class="two wide search-btn column">
											<button class="fluid ui red button" type="submit">
												хайх
											</button>
										</div>
									</div>
								</form>
							</div>
							<div class="ui stackable grid">
								<div class="sixteen wide column">
									<div id="order-list">
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
															<td>{{ number_format($order->price) }}</td>
															<td>{{ number_format($order->price*0.1) }}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
											{{ $orders->links() }}
										@else
											<div class="ui segment">
												<p>Захиалга байхгүй байна.</p>
											</div>
										@endif
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

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		var orderSearch = $('#order-search-form');
		orderSearch.submit(function(e) {
			orderSearch.find('button').addClass('loading disabled');
			$.ajax({
				method: orderSearch.attr('method'),
				url: orderSearch.attr('action'),
				data: orderSearch.serialize(),
			}).done(function(data) {
				orderSearch.find('button').removeClass('loading disabled');
				$('#order-list').html(data);
			}).fail(function() {
				orderSearch.find('button').removeClass('loading disabled');
			});
			e.preventDefault();
		});
	    $('#reservation').daterangepicker({
	        singleDatePicker: true,
			autoApply: true,
			startDate: {{ date('d/m/Y') }},
	    }, function(start, end, label) {
			var date = start.format('YYYY-MM-DD');
			$('#date').val(date);
	    });
	});
</script>
@endpush