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
															<i class="icon marker"></i>
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
														<th>{{ __('messages.Price') }}</th>
													</tr>
												</thead>
												<tbody>
													@foreach($rooms as $room)
														<tr>
															<td>{{$room->name}}</td>
															<td>{{$room->ordered_number}}</td>
															@if (App::isLocale('mn')) 
																<td>{{number_format($room->price)}}₮</td>
															@elseif (App::isLocale('en'))
																<td>${{number_format($room->price/$rate,2)}}</td>
															@endif
															<td>{{ $orderday }}</td>
															@if (App::isLocale('mn')) 
																<td>{{number_format($room->price * $room->ordered_number * $orderday)}}₮</td>
															@elseif (App::isLocale('en'))
																<td>${{number_format($room->price * $room->ordered_number * $orderday/$rate,2)}}</td>
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
													<!--<tr>
														<td colspan="2">{{ __('messages.Price before tax') }} ({{ __('messages.Tax') }} 10%)</td>
														@if (App::isLocale('mn')) 
															<td colspan="3">{{number_format($price)}} ₮ ({{number_format($price*0.1)}} ₮)</td>
														@elseif (App::isLocale('en'))
															<td colspan="3">{{number_format($price/$rate,2)}} $ ({{number_format($price*0.1/$rate,2)}} $)</td>
														@endif
													</tr>-->
													<tr>
														<td colspan="2">{{ __('messages.Total price') }}</td>
														@if (App::isLocale('mn')) 
															<td colspan="3">{{number_format($price)}} ₮</td>
														@elseif (App::isLocale('en'))
															<td colspan="3">{{number_format($price/$rate,2)}} $</td>
														@endif
													</tr>
												</tbody>
											</table>
										</div>
										<div class="ui message">
											<ul class="list">
												<li>10% VAT is included</li>
												<li>5% Property service charge is included.</li>
												<li>1% City tax is included</li>
												<li>Prepayment: Payment will be withdrawn any time after booking..</li>
												<li>Cancellation cost: No cancellation</li>
											</ul>
										</div>
				                        <div class="ui divider"></div>
										<div class="ui form">
											<h4 class="ui header">{{ __('messages.Special requests') }}</h4>
											<div class="field">
												<label>{{ __('messages.Please write your requests in English') }}</label>
												<textarea id="request"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="six wide column">
									<div class="ui segment">
										<form id="card-form" class="ui form" action="{{ url('order/card/store') }}" method="POST">
											{{ csrf_field() }}
											<h4 class="ui header">{{ __('messages.Personal information') }}</h4>
											<div class="ui divider"></div>
											<div class="two fields">
												<div class="required field">
													<label>{{ __('messages.Name') }}</label>
													<input type="text" name="name" placeholder="{{ __('messages.Name') }}" value="{{ Auth::user()->name }}">
												</div>
												<div class="required field">
													<label>{{ __('messages.Surname') }}</label>
													<input type="text" name="surname" placeholder="{{ __('messages.Surname') }}" value="{{ Auth::user()->surname }}">
												</div>
											</div>
											<div class="two fields">
												<div class="required field">
													<label>{{ __('messages.Country') }}</label>
													<select class="ui fluid dropdown" name="country">
															<option value="">{{ __('messages.Country') }}</option>
															@foreach($countries as $country)
																<option value="{{ $country }}" {{ Auth::user()->country == $country ? 'selected' : '' }}>{{ $country }}</option>
															@endforeach
													</select>
												</div>
												<div class="required field">
													<label>{{ __('messages.Phone') }}</label>
													<input type="text" name="phone_number" placeholder="{{ __('messages.Phone') }}" value="{{ Auth::user()->phone_number }}">
												</div>
											</div>
											<h4 class="ui header">{{ __('messages.Credit card information') }}</h4>
											<div class="ui divider"></div>
											<div class="field">
												<label>{{ __('messages.Total price') }}</label>
												@if (App::isLocale('mn')) 
													<input type="text" name="total" value="{{ number_format($price) }} ₮" disabled="">
												@elseif (App::isLocale('en'))
													<input type="text" name="total" value="{{ number_format($price/$rate,2) }} $" disabled="">
												@endif
											</div>
											<div class="field">
												<div class="ui left icon input">
													<input type="tel" name="card_number" placeholder="Card number" maxlength="19">
													<i class="blue credit card alternative icon"></i>
												</div>
											</div>
											<div class="field">
												<div class="ui left icon input">
													<input type="text" name="card_holders_name" placeholder="Name on card">
													<i class="blue user icon"></i>
												</div>
											</div>
											<div class="two fields">
												<div class="field">
													<div class="ui left icon input">
														<input type="text" name="expired_month" placeholder="MM" maxlength="2">
														<i class="blue calendar icon"></i>
													</div>
												</div>
												<div class="field">
													<div class="ui left icon input">
														<input type="text" name="expired_year" placeholder="YY" maxlength="2">
														<i class="blue calendar icon"></i>
													</div>
												</div>
											</div>
											<div class="field">
												<div class="ui left icon input">
													<input type="text" name="cvc" placeholder="CVC" maxlength="4">
													<i class="blue lock icon"></i>
												</div>
											</div>
											<div class="field">
												<div class="ui checkbox">
													<input type="checkbox" name="terms">
													@if (App::isLocale('mn')) 
														<label><a href="{{ url('/terms') }}" onClick="check()" target="_blank">Үйлчилгээний нөхцөл</a> зөвшөөрөх</label>
													@elseif (App::isLocale('en')) 
														<label>I agree to<a href="{{ url('/terms') }}" onClick="check()" target="_blank"> terms and condition</a></label>
													@endif
												</div>
											</div>
											<input type="hidden" name="request">
											<button type="submit" class="ui primary fluid button">{{ __('messages.Order') }}</button>
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
<script type="text/javascript">
	$.fn.form.settings.rules.month = function(value) {
		var year = $('[name="expired_year"]').val();
		if (year == '{{ date("y") }}') {
			if (value >= '{{ date("m") }}' && value <= 12) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			if (value >= 1 && value <= 12) {
				return true;
			}
			else {
				return false;
			}
		}
	}
    $('#card-form').form({
        inline : true,
        fields: {
            name: {
                identifier: 'name',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter your name") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            surname: {
                identifier: 'surname',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter your surname") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            country: {
                identifier: 'country',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please select a country") }}'
                    }
                ]
            },
            phone_number: {
            	identifier: 'phone_number',
            	rules: [
            		{
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter a phone number") }}'
            		}
            	]
            },
            terms: {
                identifier: 'terms',
                rules: [
                    {
                        type   : 'checked',
                        prompt : '{{ __("form.Please agree terms of service") }}'
                    }
                ]
            },
            card_number: {
            	identifier: 'card_number',
            	rules: [
            		{
            			type   : 'creditCard',
            			prompt : '{{ __("form.Card number is wrong") }}'
            		}
            	]
            },
            card_holders_name: {
                identifier: 'card_holders_name',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter a value") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            expired_month: {
                identifier: 'expired_month',
                rules: [
                    {
                        type   : 'month',
                        prompt : '{{ __("form.Please enter a valid expiry date") }}',
                    },
                    {
                        type   : 'exactLength[2]',
                        prompt : '{{ __("form.Please enter a valid expiry date") }}'
                    },
                ]
            },
            expired_year: {
                identifier: 'expired_year',
                rules: [
                    {
                        type   : 'integer[{{ date("y") }}..99]',
                        prompt : '{{ __("form.Please enter a valid expiry date") }}'
                    },
                    {
                        type   : 'exactLength[2]',
                        prompt : '{{ __("form.Please enter a valid expiry date") }}'
                    },
                ]
            },
            cvc: {
                identifier: 'cvc',
                rules: [
                    {
                        type   : 'number',
                        prompt : '{{ __("form.Please enter a valid CVC") }}'
                    },
                    {
                        type   : 'minLength[3]',
                        prompt : '{{ __("form.Please enter a valid CVC") }}'
                    },
                    {
                        type   : 'maxLength[4]',
                        prompt : '{{ __("form.Please enter a valid CVC") }}'
                    },
                ]
            },
        },
        onSuccess: function() {
        	var value = $('#request').val();
        	$('#card-form').find('[name=request]').val(value);
			$('#card-form').find('button[type=submit]').addClass('loading disabled');
        },
		onFailure: function(formErrors, fields) {
			var element;
			$.each(fields, function(e) {
				element = $('[name=' + e + ']');
				if(element.closest('.field').hasClass('error')) {
					if (element.parent().hasClass('dropdown')) {
						$(window).scrollTop(element.parent().offset().top - $(window).height() / 2);
					}
					else {
						element.focus();
					}
					return false;
				}
			});
			return false;
		},
    });
</script>
@endpush