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
										<h4 class="ui header">Буудлын мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="three wide column">
									@include('profile.hotel.partials.sidebar')
								</div>
								<div class="thirteen wide column">
									<table class="ui selectable table">
										<tbody>
											@if ($hotel->payment)
												<tr>
													<td class="collapsing">
														<h5 class="ui header">Төлбөрийн нөхцөл</h5>
													</td>
													<td>
														<div class="ui tiny images">
															@foreach (unserialize($hotel->payment) as $payment)
																@if ($payment == 1)
																	<img class="ui image" src="{{ asset('img/card1.svg') }}">
																@endif
																@if ($payment == 2)
																	<img class="ui image" src="{{ asset('img/card2.svg') }}">
																@endif
																@if ($payment == 3)
																	<img class="ui image" src="{{ asset('img/card3.svg') }}">
																@endif
																@if ($payment == 4)
																	<img class="ui image" src="{{ asset('img/card4.svg') }}">
																@endif
																@if ($payment == 5)
																	<img class="ui image" src="{{ asset('img/card5.svg') }}">
																@endif
																@if ($payment == 6)
																	<img class="ui image" src="{{ asset('img/card6.svg') }}">
																@endif
															@endforeach
														</div>
													</td>
												</tr>
											@endif
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Захиалга цуцлах нөхцөл</h5>
												</td>
												<td>
													{{ $hotel->co_day }} өдрийн өмнө цуцлаагүй бол {{ $hotel->co_payment }} төлнө.
												</td>
											</tr>
										</tbody>
									</table>
									<a class="ui primary right floated button" href="{{ url('hotel/payment', $hotel->id) }}">Засах</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@if (session()->has('status'))
	<div class="ui basic modal" id="success-message">
		<div class="ui icon header">
			<i class="green check icon"></i>
			{{ session('status') }}
		</div>
	</div>
@endif
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#success-message').modal('show');
	});
</script>
@endpush