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
											<div class="responsive-table">
												<table class="ui celled unstackable table" id="order-table">
													<thead>
														<tr>
															<th>{{ __('messages.Room name') }}</th>
															<th>{{ __('messages.Number of room') }}</th>
															<th>{{ __('messages.Cost of per night') }}</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($rooms as $room)
															<tr>
																<td>{{ $room->name }}</td>
																<td>{{ $room->ordered_number }}</td>
																@if (App::isLocale('mn')) 
																	<td>{{number_format($room->price)}}₮</td>
																@elseif (App::isLocale('en'))
																	<td>${{number_format($room->price/$rate,2)}}</td>
																@endif
															</tr>
															<tr>
																<td colspan="2">
																	<p class="ui right aligned header">{{__('messages.Duration')}}</p>
																</td>
																<td>{{ $orderday }} {{ __('messages.Day') }}</td>
															</tr>
															<tr>
																<td colspan="2">
																	<p class="ui right aligned header">{{__('messages.Subtotal')}}</p>
																</td>
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
														<tr>
															<td colspan="2">
																<p class="ui center aligned header" style="text-transform: uppercase;">{{ __('messages.Total price') }}</p>
															</td>
															@if (App::isLocale('mn')) 
																<td colspan="3">
																	<p class="ui center aligned header">{{number_format($price)}} ₮</p>
																</td>
															@elseif (App::isLocale('en'))
																<td colspan="3">
																	<p class="ui center aligned header">${{number_format($price/$rate,2)}}</p>
																</td>
															@endif
														</tr>
														<tr>
															<td colspan="2">Cancellation policy</td>
															<td colspan="3">No cancellation</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
				                        <div class="ui divider"></div>
										@if ($pickup)
					                        <div class="ui form">
												<h4 class="ui header">{{ __('messages.Flight information for airport pickup service') }}</h4>
												<div class="three fields">
													<div class="field">
														<div class="ui left icon input">
															<input type="text" id="arrivaldate" placeholder="Arrival date">
															<i class="calendar icon"></i>
														</div>
													</div>
													<div class="field">
														<input type="text" id="flightnumber" placeholder="Flight number">
													</div>
													<div class="field">
														<input type="text" id="arrivaltime" placeholder="Arrival time">
													</div>
												</div>
					                        </div>
				                        @endif
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
													<input type="text" name="name" placeholder="{{ __('messages.Name') }}" value="{{ Auth::check() ? Auth::user()->name: '' }}">
												</div>
												<div class="required field">
													<label>{{ __('messages.Surname') }}</label>
													<input type="text" name="surname" placeholder="{{ __('messages.Surname') }}" value="{{ Auth::check() ? Auth::user()->surname : '' }}">
												</div>
											</div>
											<div class="two fields">
												<div class="required field">
													<label>{{ __('messages.Country') }}</label>
													<div class="ui fluid search selection dropdown" id="country">
														<input type="hidden" name="country">
														<i class="dropdown icon"></i>
														<input class="search">
														<div class="default text">Улс сонгох</div>
														<div class="menu">
															@foreach($countries as $country)
																<div class="item" data-value="{{ $country }}">
																	{{ $country }}
																</div>
															@endforeach
														</div>
													</div>
												</div>
												<div class="required field">
													<label>{{ __('messages.Phone') }}</label>
													<input type="text" name="phone_number" placeholder="{{ __('messages.Phone') }}" value="{{ Auth::check() ? Auth::user()->phone_number : '' }}">
												</div>
											</div>
											@unless (Auth::check())
												<div class="two fields">
													<div class="required field">
														<label>{{ __('messages.Email') }}</label>
														<input type="text" name="email_order" placeholder="{{ __('messages.Email') }}">
													</div>
													<div class="required field">
														<label>{{ __('messages.Confirm email') }}</label>
														<input type="text" name="email_confirm" placeholder="{{ __('messages.Confirm email') }}">
													</div>
												</div>
											@endunless
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
											<div class="two fields">
												<div class="field">
													<img class="ui image" src="{{ asset('img/ssl.png') }}">
												</div>
												<div class="field">
													<span>We accept:</span>
													<div class="two fields">
														<div class="field">
															<img class="ui image" src="{{ asset('img/visa.png') }}">
														</div>
														<div class="field">
															<img class="ui image" src="{{ asset('img/jcb.png') }}">
														</div>
													</div>
												</div>
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
													<input type="text" name="cvc" placeholder="CVV" maxlength="4">
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
											<input type="hidden" name="arrivaldate">
											<input type="hidden" name="flightnumber">
											<input type="hidden" name="arrivaltime">
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
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script type="text/javascript">
    $('#arrivaldate').daterangepicker({
		autoApply: true,
		autoUpdateInput: false,
		singleDatePicker: true,
    });
	$('#arrivaldate').on('apply.daterangepicker', function(ev, picker) {
		$(this).val(picker.startDate.format('YYYY-MM-DD'));
	});
	$(document).ready(function() {
		$('#country').dropdown('set selected', '{{ Auth::check() ? Auth::user()->country : "" }}');
	});
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
                        prompt : '{{ __("form.Please enter your phone number") }}'
            		},
            		{
                        type   : 'number',
                        prompt : '{{ __("form.Please enter your phone number") }}'
            		}
            	]
            },
            email_order: {
            	identifier: 'email_order',
            	rules: [
            		{
                        type   : 'email',
                        prompt : '{{ __("form.Please enter your email") }}'
            		},
            		{
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter your email") }}'
            		}
            	]
            },
            email_confirm: {
            	identifier: 'email_confirm',
            	rules: [
            		{
                        type   : 'match[email_order]',
                        prompt : '{{ __("form.Email doesnt match") }}'
            		},
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
                        prompt : '{{ __("form.Please enter a valid CVV") }}'
                    },
                    {
                        type   : 'minLength[3]',
                        prompt : '{{ __("form.Please enter a valid CVV") }}'
                    },
                    {
                        type   : 'maxLength[4]',
                        prompt : '{{ __("form.Please enter a valid CVV") }}'
                    },
                ]
            },
        },
        onSuccess: function() {
        	$('#card-form').find('[name=request]').val($('#request').val());
        	$('#card-form').find('[name=arrivaldate]').val($('#arrivaldate').val());
        	$('#card-form').find('[name=flightnumber]').val($('#flightnumber').val());
        	$('#card-form').find('[name=arrivaltime]').val($('#arrivaltime').val());
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