@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">{{ __('messages.Order information') }}</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{ url('/') }}">{{ __('messages.Home') }}</a>
					<span class="divider">/</span>
					<div class="active section">{{ __('messages.Order information') }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="silver-back">
	<div class="main-page">
		<div class="ui fluid stackable container">
			<div class="ui column grid">
				<div class="sixteen wide column">
					<div class="ui stackable container">
						<div class="ui stackable grid">
							<div class="ui two column row">
								<div class="ten wide column">
									<div class="ui segment">
										<h4 class="ui header">{{ __('messages.Order information') }}</h4>
										<div class="ui divided items">
											<div class="item">
												<div class="image">
													<img class="ui top aligned medium image" src="{{asset($hotel->cover_photo)}}">
												</div>
												<div class="content">
													<h4 class="header">
														@if (App::isLocale('mn')) 
															{{ $hotel->name }}
														@elseif (App::isLocale('en'))
															@if($hotel->name_en)
																{{ $hotel->name_en }}
															@else
																{{$hotel->name}}
															@endif
														@endif
													</h4>
													<div class="meta">
														<div class="ui header">
															@for($i = 0; $i < $hotel->star; $i++)
																<i class='icon yellow star'></i>
															@endfor
														</div>
													</div>
													<div class="meta">
														<div class="ui header">
															<i class="icon location arrow"></i>
															@if (App::isLocale('mn')) 
																{{ $hotel->address }}
															@elseif (App::isLocale('en'))
																@if($hotel->address_en)
																	{{ $hotel->address_en }}
																@else
																	{{$hotel->address}}
																@endif
															@endif
														</div>
													</div>
													<div class="meta">
												 		<div class="ui header">
															<i class="icon phone"></i>
															{{$hotel->phone_number}}
														</div>
													</div>
													@if ($hotel->website)
														<div class="meta">
															<div class="ui header">
																<i class="icon world"></i>
																{{$hotel->website}}
															</div>
														</div>
													@endif
													<div class="extra">
														<div class="ui label"> {{ __('messages.Check-in') }}: {{$startdate}}</div>
														<div class="ui label"> {{ __('messages.Check-out') }}: {{$enddate}}</div>
													</div>
												</div>
											</div>
											<h4 class="header">{{ __('messages.Ordered rooms') }}</h4>
											<table class="ui celled table">
												<thead>
													<tr>
														<th>{{ __('messages.Room name') }}</th>
														<th>{{ __('messages.Rooms') }}</th>
														<th>{{ __('messages.Cost of per night') }}</th>
														<th>{{ __('messages.Day') }}</th>
														<th>{{ __('messages.Total') }}</th>
													</tr>
												</thead>
												<tbody>
													@foreach($rooms as $room)
														<tr>
															<td>{{$room->name}}</td>
															<td>{{$room->ordered_number}}</td>
															@if (App::isLocale('mn')) 
																@if($room->saled_room)
																	<td>{{number_format($room->saled_room->price)}} ₮</td>
																@else
																	<td>{{number_format($room->price)}} ₮</td>
																@endif
															@elseif (App::isLocale('en'))
																@if($room->saled_room)
																	<td>{{number_format($room->saled_room->price/$rate,2)}} ₮</td>
																@else
																	<td>{{number_format($room->price/$rate,2)}} $</td>
																@endif
															@endif
															<td>{{ $orderday }}</td>
															@if (App::isLocale('mn')) 
																@if($room->saled_room)
																	<td>{{number_format($room->saled_room->price * $room->ordered_number * $orderday)}} ₮</td>
																@else
																	<td>{{number_format($room->price * $room->ordered_number * $orderday)}} ₮</td>
																@endif
															@elseif (App::isLocale('en'))
																@if($room->saled_room)
																	<td>{{number_format($room->saled_room->price * $room->ordered_number * $orderday/$rate,2)}} $</td>
																@else
																	<td>{{number_format($room->price * $room->ordered_number * $orderday/$rate,2)}} $</td>
																@endif
															@endif
														</tr>
													@endforeach
													@if ($pickup)
														<tr>
															<td colspan="2">{{ __('messages.Pickup service') }}</td>
															@if (App::isLocale('mn'))
																<td colspan="3">{{ $pickup->name }} - {{number_format($pickup->price)}}₮</td>
															@elseif (App::isLocale('en'))
																<td colspan="3">{{ $pickup->name_en }} - {{number_format($pickup->price/$rate,2)}}$</td>
															@endif
														</tr>
													@endif
													<tr>
														<td colspan="2">{{ __('messages.Price before tax') }} ({{ __('messages.Tax') }} 10%)</td>
														@if (App::isLocale('mn')) 
															<td colspan="3">{{number_format($price)}} ₮ ({{number_format($price*0.1)}} ₮)</td>
														@elseif (App::isLocale('en'))
															<td colspan="3">{{number_format($price/$rate,2)}} $ ({{number_format($price*0.1/$rate,2)}} $)</td>
														@endif
													</tr>
													<tr>
														<td colspan="2">{{ __('messages.Price after tax') }}</td>
														@if (App::isLocale('mn')) 
															<td colspan="3">{{number_format($price*1.1)}} ₮</td>
														@elseif (App::isLocale('en'))
															<td colspan="3">{{number_format($price*1.1/$rate,2)}} $</td>
														@endif
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="six wide column">
									<div class="ui segment">
										<form class="ui form">
											{{ csrf_field() }}
											<h4 class="ui header">{{ __('messages.Credit card information') }}</h4>
											<div class="ui divider"></div>
											<div class="sixteen wide field">
												<div class="field">
													<label>Нийт дүн / Total Price</label>
													@if (App::isLocale('mn')) 
														<input type="text" name="total" value="{{ number_format($price*1.1) }} ₮" disabled="">
														<input type="hidden" name="price" value="{{ number_format($price*1.1) }}">
													@elseif (App::isLocale('en'))
														<input type="text" name="total" value="{{ number_format($price*1.1/$rate,2) }} $" disabled="">
														<input type="hidden" name="price" value="{{ number_format($price*1.1/$rate,2) }}">
													@endif
												</div>
											</div>
										</form><br>
										<form id="card-form" action="{{ url('order/card/store') }}" method="POST" >
											{{ csrf_field() }}
											<div class="card-js" id="my-card" data-capture-name="true"  data-icon-colour="#158CBA">>
												<input class="card-number my-custom-class" data-rule-required="true" name="card_number">
												<input class="name" id="the-card-name-id" data-rule-required="true" name="card_holders_name" placeholder="Name on card">
												<input class="expiry-month" data-rule-required="true" name="expiry_month">
												<input class="expiry-year" data-rule-required="true" name="expiry_year">
												<input class="cvc" data-rule-required="true" name="cvc">
											</div><br>
											<div class="ui checkbox">
												<input type="checkbox" name="terms" id="terms">
												@if (App::isLocale('mn')) 
													<label><a href="{{ url('/terms') }}" onClick="check()" target="_blank">Үйлчилгээний нөхцөл</a> зөвшөөрөх</label>
												@elseif (App::isLocale('en')) 
													<label>I agree to<a href="{{ url('/terms') }}" onClick="check()" target="_blank"> terms and condition</a></label>
												@endif
											</div>
											<div class="sixteen wide field">
												<span class="error-msg"></span><br>
											</div>
											<input type="hidden" class="expired_year" name="expired_year">
											<input type="hidden" class="expired_month" name="expired_month">
											<button type="submit" id="submitOrder" class="ui primary fluid submit button">{{ __('messages.Order') }}</button>
										</form>
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
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/card-js.min.js') }}"></script>
<script src="{{ asset('js/jquery.creditCardValidator.js') }}"></script>
<script type="text/javascript">
	$("#card-form").validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",
		messages: {
			card_number: {
				required: '*{{ __("form.Please enter a value") }}'
			},
			card_holders_name: {
				required: '*{{ __("form.Please enter a value") }}'
			},
			expiry_month: {
				required: '*{{ __("form.Please enter a value") }}'
			},
			expiry_year: {
				required: '*{{ __("form.Please enter a value") }}'
			},
			cvc: {
				required: '*{{ __("form.Please enter a value") }}'
			},
		},
		submitHandler: function(form) {
			$('#submitOrder').addClass('loading disabled');
			$('.my-custom-class').validateCreditCard(function(result) {
				var myCard = $('#my-card');
				var expiryMonth = myCard.CardJs('expiryMonth');
				var expiryYear = myCard.CardJs('expiryYear');
				var valid = CardJs.isExpiryValid(expiryMonth, expiryYear);
				if(result.valid == false){
					$('#submitOrder').removeClass('loading disabled');
					$('.error-msg').html('*{{ __("form.Card number is wrong")}}');
				}
				else if(valid == false){
					$('#submitOrder').removeClass('loading disabled');
					$('.error-msg').html('*{{ __("form.Please enter a valid expiry date")}}');
				}
				else {
					$('.error-msg').html('');
					$('.expired_year').val(expiryYear);
					$('.expired_month').val(expiryMonth);
					form.submit();
				}
			});
		}
	});
	if($('#terms').is(':checked')){
		$('#submitOrder').removeClass('disabled');
	}else{
		$('#submitOrder').addClass('disabled');
	}
	$('#terms').change(function() {
		if($(this).is(":checked")) {
			$('#submitOrder').removeClass('disabled');
		}else{
			$('#submitOrder').addClass('disabled');
		}
	});
	function check(){
		$("#terms").prop('checked', true);
		$('#submitOrder').removeClass('disabled');
	}
</script>
@endpush