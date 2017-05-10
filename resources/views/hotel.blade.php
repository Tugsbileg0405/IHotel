@extends('layouts.app') 
@section('title', 'iHotel') 
@section('content')
<div class="main-breadcrumb">
	<div class="header-search">
		<div class="ui container">
			<div class="ui stackable column grid">
				<div class="four wide column">
					<div class="local example">
						<div class="ui search searhlocation">
							<div class="ui fluid left icon input datalocation">
								<input class="prompt" type="text" id="searchplace" placeholder="{{ __('messages.Destination') }}">
								<i class="marker icon"></i>
							</div>
							<div class="results"></div>
						</div>
					</div>
				</div>
				<div class="four wide column">
					<form class="ui form">
						<div class="ui fluid left icon input">
							<input type="text" name="reservation" id="reservation" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="" />
							<i class="calendar icon"></i>
						</div>
					</form>
				</div>
				<div class="three wide column">
					<div class="ui form">
						<div class="people" style="display: {{$roomnumber >= 15 ? '' : 'none' }}">
							<a class="plus" href="#" id="plus0">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="roomnumber" min="1" placeholder="{{ __('messages.Rooms') }}" id="selectedRoom" value="{{ $roomnumber ? $roomnumber : 2 }}">
							<a class="minus" href="#" id="minus0">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="{{$roomnumber < 15 ? 'ui' : '' }} fluid search dropdown selectedRoom" style="display: {{$roomnumber < 15 ? '' : 'none' }}">
                        	    <option value="">{{ __('messages.Rooms') }}</option>
                        	    @for ($i=1; $i< 15; $i++)
                        	    <option value="{{ $i }}" @If($i == $roomnumber) selected @endif>{{ $i }} {{ __('messages.room') }}</option>
                        	    @endfor
                        	    <option value="more">{{ __('messages.More') }}</option>
                        	</select>
					</div>
				</div>
				<div class="three wide column">
					<div class="ui form">
						<div class="room" style="display: {{$peoplenumber >= 15 ? '' : 'none' }}">
							<a class="plus" href="#" id="plus1">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="peoplenumber" min="1" placeholder="{{ __('messages.People') }}" id="selectedPeople" value="{{ $peoplenumber ? $peoplenumber : 1 }}">
							<a class="minus" href="#" id="minus1">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="{{$peoplenumber < 15 ? 'ui' : '' }} fluid search dropdown selectedPeople" style="display: {{$peoplenumber < 15 ? '' : 'none' }}">
                                 <option value="">{{ __('messages.People') }}</option>
                                 @for ($i=1; $i< 15; $i++)
                                 <option value="{{ $i }}" @If($i == $peoplenumber) selected @endif>{{ $i }} {{ __('messages.people') }}</option>
                                 @endfor
                                 <option value="more">{{ __('messages.More') }}</option>
                             </select>
					</div>
				</div>
				<div class="two wide column">
					<div class="fluid ui red button" id="searchButton" data-token="{{ csrf_token() }}">
						{{ __('messages.Search') }}
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="eight wide column">
				<h4 class="ui header">
					<div>
						@if (App::isLocale('mn')) 
							{{ $hotel->name }} 
						@elseif (App::isLocale('en')) 
							@if($hotel->name_en) 
								{{ $hotel->name_en }} 
							@else
								{{$hotel->name}} 
							@endif 
						@endif 
						@for ($i=0; $i<$hotel->star; $i++)
							<i class="icon yellow star"></i> 
						@endfor
					</div>
					<div class="sub header">
						@if (App::isLocale('mn')) 
							{{ $hotel->address }} 
						@elseif (App::isLocale('en')) 
							@if($hotel->address_en) 
								{{ $hotel->address_en}} 
							@else 
								{{$hotel->address}} 
							@endif 
						@endif
					</div>
				</h4>
			</div>
			<div class="right aligned eight wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{url('/')}}">{{ __('messages.Home') }}</a>
					<span class="divider">/</span>
					<div class="active section">
						@if (App::isLocale('mn')) 
							{{ $hotel->name }} 
						@elseif (App::isLocale('en')) 
							@if($hotel->name_en) 
								{{ $hotel->name_en }} 
							@else
								{{$hotel->name}} 
							@endif 
						@endif
					</div>
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
					<div class="ui stackable container content-search">
						<div class="ui stackable segment">
							<div class="ui stackable grid">
								<div class="five wide column">
									<div id="main" role="main">
										<section class="slider">
											<div id="slider" class="flexslider">
												<ul class="slides">
													@if ($hotel->cover_photo)
													<li>
														<a class="popup-link" href="{{asset($hotel->cover_photo)}}">
															<img src="{{asset($hotel->cover_photo)}}"/>
														</a>
													</li>
													@endif 
													@if ($hotel->other_photos) 
														@foreach (unserialize($hotel->other_photos) as $photo)
														<li>
															<a class="popup-link" href="{{asset($photo)}}">
																<img src="{{asset($photo)}}" />
															</a>
														</li>
														@endforeach 
													@endif
												</ul>
											</div>
											<div id="carousel" class="flexslider">
												<ul class="slides">
													@if ($hotel->cover_photo)
													<li>
														<img src="{{asset($hotel->cover_photo)}}" />
													</li>
													@endif 
													@if($hotel->other_photos) 
														@foreach (unserialize($hotel->other_photos) as $photo)
														<li>
															<img src="{{asset($photo)}}" />
														</li>
														@endforeach 
													@endif
												</ul>
											</div>
										</section>
									</div>
									<div class="pay-total">
										<div class="ui  yellow inverted segment">
											<h4 class="ui header">{{ __('messages.Your order') }}</h4>
											@if($startdate != 'undefined')
												<p>{{ __('messages.Night') }}: <span id="difference">0</span></p>
												<p>{{ $startdate }} - {{ $enddate }}</p>
											@else
												<p>{{ __('messages.Choose a day') }}</p>
											@endif
											<h4 class="ui header">{{ __('messages.Pickup service') }}</h4>
											<div class="ui form">
												<div class="grouped fields" id="pickups">
													@foreach($pickups as $pickup)
													<div class="field">
														<div class="ui checkbox">
															<input type="checkbox" name="carrent" id="carrent{{ $pickup->id }}" data-id="{{ $pickup->id }}" data-price="{{ $pickup->price }}" class="pickup hidden"> 
															@if (App::isLocale('mn'))
																<label>{{ $pickup->name }} - {{number_format($pickup->price)}}₮</label> 
															@elseif (App::isLocale('en'))
																<label>{{ $pickup->name_en }} - {{number_format($pickup->price/$rate,2)}}$</label>
															@endif
														</div>
													</div>
													@endforeach
												</div>
											</div>
											<h4 class="ui header">{{ __('messages.Rooms') }}</h4>
											<div id="roomtype" class="ui middle aligned divided list">
												<div class="item" style="color:black" id="nullRoom">
													{{ __('messages.Choose a room') }}
												</div>
												<!--<div class="item">
													<div class="content">
														<h2 class="ui sub header">
															{{ __('messages.Tax') }}
														</h2>
														@if (App::isLocale('mn'))
															<span id="nuat">{{number_format(0)}} ₮</span> 
														@elseif (App::isLocale('en'))
															<span id="nuat">{{number_format(0)}} $</span> 
														@endif
													</div>
												</div>-->
												<div class="item">
													<div class="right floated content">
														<div class="ui ihotel button" id="order">{{ __('messages.Order') }}</div>
													</div>
													<div class="content">
														<h2 class="ui sub header">{{ __('messages.Total price') }}:</h2>
														@if (App::isLocale('mn'))
															<h2 class="ui sub header" id="totalPrice">0 ₮</h2>
														@elseif (App::isLocale('en'))
															<h2 class="ui sub header" id="totalPrice">0 $</h2>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
									@if($hotel->is_internet != 0 OR $hotel->is_child != 0 OR $hotel->services->count() != 0)
									<h4 class="ui header">{{ __('messages.Options') }}</h4>
									<div class="ui segment">
										<div class="ui list">
											@if($hotel->is_internet == 1)
											<div class="item">
												<i class="circular wifi icon"></i>
												<div class="content">
													{{ __('messages.Wifi') }}
												</div>
											</div>
											@endif 
											@if($hotel->is_child == 1)
											<div class="item">
												<i class="circular child icon"></i>
												<div class="content">
													{{ __('messages.Children are welcome') }}
												</div>
											</div>
											@endif 
											@if($hotel->services) 
												@foreach($hotel->services as $service)
												<div class="item">
													<i class="circular tags icon"></i>
													<div class="content">
														@if (App::isLocale('en')) 
															@if($service->name_en) 
																@if($service->name_en) 
																	{{ $service->name_en }} 
																@else 
																	{{$service->name}}
																@endif 
															@else 
																{{$service->name}} 
															@endif 
														@elseif (App::isLocale('mn')) 
															{{$service->name}} 
														@endif
													</div>
												</div>
												@endforeach 
											@endif
										</div>
									</div>
									@endif
								</div>
								<div class="eleven wide column">
									<div class="ui sizer vertical segment">
										<div class="ui large header">
											{{ __('messages.Introduction') }}
										</div>
										<p class="ui justify">
											@if (App::isLocale('mn')) 
												{{ $hotel->introduction }} 
											@elseif (App::isLocale('en')) 
												@if($hotel->introduction_en) 
													{{ $hotel->introduction_en}} 
												@else 
													{{$hotel->introduction}} 
												@endif 
											@endif
										</p>
									</div>
									<div class="ui sizer vertical segment">
										<div class="ui large header">{{ __('messages.Contact') }}</div>
										<p class="ui justify">
											<i class="circular mail icon"></i>{{ $hotel->email }} <i class="circular phone icon"></i>
											{{ $hotel->phone_number}}
										</p>
									</div>
									<div class="ui sizer vertical segment">
										<div class="ui large header">{{ __('messages.Address') }}</div>
										<p class="ui justify">
											<i class="circular marker icon"></i> 
											@if (App::isLocale('mn')) 
												{{ $hotel->address }} 
											@elseif (App::isLocale('en'))
												@if($hotel->address_en) 
													{{ $hotel->address_en }} 
												@else 
													{{$hotel->address}} 
												@endif 
											@endif
										</p>
									</div>
									<div class="ui sizer vertical segment">
										<div class="ui large header">what3words</div>
										<p class="ui justify" style="vertical-align:middle;line-height:30px !important;display:flex">
											<img src="{{ asset('img/what3word.jpg')}}" height="30" style="border-radius:50%;margin-right:10px" width="30" alt="">											
											@if (App::isLocale('mn'))
												<a href="https://map.what3words.com/{{$hotel->what3words}}" target="_blank">
													{{$hotel->what3words}}
												</a> 
											@elseif (App::isLocale('en')) 
												@if($hotel->what3words_en)
													<a href="https://map.what3words.com/{{$hotel->what3words_en}}" target="_blank">
														{{$hotel->what3words_en}}
													</a> 
												@else
													<a href="https://map.what3words.com/{{$hotel->what3words}}" target="_blank">
														{{$hotel->what3words}}
													</a> 
												@endif 
											@endif
										</p>
									</div>
									<div class="ui large header">{{ __('messages.Rooms') }}</div>
									@foreach($rooms as $key=>$room)
									<div class="ui segment">
										<div class="ui stackable column grid">
											<div class="four wide column">
											@if($room->photos)
												<img class="ui image" src="{{ asset(unserialize($room->photos)[0]) }}" />
											@endif
											</div>
											<div class="eight wide column">
												<div class="ui large header">{{$room->name}}</div>
												<p class="ui justify">
													@if (App::isLocale('mn')) 
														{{ $room->introduction }} 
													@elseif (App::isLocale('en')) 
														@if($room->introduction_en) 
															{{ $room->introduction_en}} 
														@else 
															{{$room->introduction}} 
														@endif 
													@endif
												</p>
												<div class="ui horizontal list">
													@if($room->people_number)
													<div class="item">
														<i class="circular user icon"></i>
														<div class="middle aligned content">
															x{{ $room->people_number }}
														</div>
													</div>
													@endif 
													@if($room->bed_number)
													<div class="item">
														<i class="circular hotel icon"></i>
														<div class="middle aligned content">
															x{{ $room->bed_number }}
														</div>
													</div>
													@endif 
													@if($room->size)
													<div class="item">
														<i class="circular expand icon"></i>
														<div class="middle aligned content">
															{{ $room->size }} m2
														</div>
													</div>
													@endif
												</div>
											</div>
											<div class="four wide column">
												@if (App::isLocale('mn')) 
													@if($room->saled_room) 
														@foreach($room->saled_room as $sale)
															<div class="ui large header" id="price{{$key}}" data-price="{{$sale->price}}">
																<!--<span class="sub header" style="text-decoration: line-through">{{number_format($room->price)}}₮/{{ __('messages.per night') }}</span>-->
																<div>{{ number_format($sale->price)}}₮/{{ __('messages.per night') }}</div>
															</div>
														@endforeach
													@else
														<div class="ui large header" id="price{{$key}}" data-price="{{$room->price}}">{{number_format($room->price)}}₮/{{ __('messages.per night') }}</div>
													@endif 
												@elseif (App::isLocale('en')) 
													@if($room->saled_room) 
														@foreach($room->saled_room as $sale)
														<div class="ui large header" id="price{{$key}}" data-price="{{$sale->price}}">
															<!--<span  class="sub header" style="text-decoration: line-through">{{number_format($room->price/$rate,2)}}$/{{ __('messages.per night') }}</span>-->
															<div>{{ number_format($sale->price/$rate,2)}}$/{{ __('messages.per night') }}
															</div>
														</div>
														@endforeach 
													@else
														<div class="ui large header" id="price{{$key}}" data-price="{{$room->price}}">{{number_format($room->price/$rate,2)}}$/{{ __('messages.per night') }}</div>
													@endif 
												@endif
												<p class="ui justify">
													@if($room->number < 1)
														<select class="ui fluid search dropdown disabled">
															<option value="disabled" >{{ __('messages.No rooms available') }}</option>
														</select> 
													@else
														<select class="ui fluid search dropdown" id="night{{$key}}">
															<option value="selected" >{{ __('messages.Choose a room') }}</option>
															@for ($i = 1; $i <= $room->number; $i++)
																@if (App::isLocale('mn'))
																	@if($room->saled_room)
																		@foreach($room->saled_room as $sale)
																			<option value="{{$i}}">{{$i}} {{ __('messages.room') }} - {{number_format($sale->price * $i)}}₮</option>
																		@endforeach
																	@else
																		<option value="{{$i}}">{{$i}} {{ __('messages.room') }} - {{number_format($room->price * $i)}}₮</option>
																	@endif 
																@elseif (App::isLocale('en'))
																	@if($room->saled_room)
																		@foreach($room->saled_room as $sale)
																			<option value="{{$i}}">{{$i}} {{ __('messages.room') }} - {{number_format($sale->price * $i/$rate,2)}}$</option>
																		@endforeach
																	@else
																		<option value="{{$i}}">{{$i}} {{ __('messages.room') }} - {{number_format($room->price * $i/$rate,2)}}$</option>
																	@endif  
																@endif
															@endfor
														</select> 
													@endif
												</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection @push('script')
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&libraries=places"></script>
<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
<script>
	function initMap() {
		var input = document.getElementById('searchplace');
		var autocomplete = new google.maps.places.Autocomplete(input, { types: ['(cities)'] });
	}

	initMap();

	$('.ui.radio.checkbox')
		.checkbox()
		;
	$(window).load(function () {
		$('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 100,
			itemMargin: 5,
			asNavFor: '#slider'
		});
		$('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel",
			start: function (slider) {
				$('body').removeClass('loading');
			}
		});

		$('.popup-link').magnificPopup({
			type: 'image',
			gallery: { enabled: true }
		});
	});

</script>
<script>
	// =============================================================================
	// - Remove information of room from order section 
	// =============================================================================

	var Totalsum = 0;
	var pickup = {};
	var pickup_price = 0;
	var array = [];
	var orderData = [];
	array = <?php echo json_encode($rooms);?>;
	var pickups = [];
	pickups = <?php echo json_encode($pickups); ?>;
	$(document).ready(function () {
		$.each(array, function (index, value) {
			var selectedval = $('#night' + index).find(":selected").val();
			var sum = 0;
			var string = '';
			var defaultID = '.nightRoom0';
			var counter = 0;
			var defaultclass = '';
			var totalprice = 0;
			var nuat = 0;
			var rating = "{{$rate}}";
			var perprice = $('#price' + index).data('price');
			if (selectedval == 'selected' || selectedval == null) {
				removeRow(index);
			}
			else {
				Totalsum = 0;
				var dayprice = perprice * selectedval;
				$('#nullRoom').hide();
				@if (App::isLocale('mn')) 
				string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
						<div class="right floated content " >\
							<button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
							{{__("messages.remove")}}\
							</button>\
						</div>\
						<div class="content">\
							<h2 class="ui sub header" >\
							'+ value.name + '\
							</h2>\
							<span class="perprice">'+ selectedval + ' {{__("messages.room")}} - ' + numeral(perprice * selectedval).format('0,0') + '₮</span>\
							<span class="price" style="display:none">'+ plus * perprice * selectedval + '</span>\
						</div>\
						</div>';
				@elseif(App::isLocale('en'))
				string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
						<div class="right floated content " >\
							<button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
							{{__("messages.remove")}}\
							</button>\
						</div>\
						<div class="content">\
							<h2 class="ui sub header" >\
							'+ value.name + '\
							</h2>\
							<span class="perprice">'+ selectedval + ' {{__("messages.room")}} - ' + numeral(perprice * selectedval / rating).format('0,0.00') + '$</span>\
							<span class="price" style="display:none">'+ parseFloat(plus * perprice * selectedval / rating).toFixed(2) + '</span>\
						</div>\
						</div>';
				@endif
				var className = '.nightRoom';
				var final = className.concat(index);
				if (final == defaultID) {
					defaultclass = 'nightRoom';
					var concatted = defaultclass.concat(index);
					defaultID = final;
					var val = $("div").hasClass(concatted);
				if (val == true) {
					changeDesc(index, selectedval);
					$("#order").removeClass("disabled");
					@if (App::isLocale('mn')) 
						$("#roomtype").find(final).find('.price').text(plus * perprice * selectedval);
						$("#roomtype").find(final).find('.perprice').text(this.value + ' {{__("messages.room")}} - ' + numeral(perprice * selectedval).format('0,0') + '₮');
					@elseif(App::isLocale('en'))
						$("#roomtype").find(final).find('.price').text(plus * perprice * selectedval / rating);
						$("#roomtype").find(final).find('.perprice').text(selectedval + ' {{__("messages.room")}} - ' + numeral(perprice * selectedval / rating).format('0,0.00') + '$');
					@endif
                }
                else {
					$("#order").removeClass("disabled");
					orderData.push({ id: index, room_number: selectedval, room_id: value.id });
					$('#roomtype').prepend(string);
				}
            }
            else {
				defaultID = final;
				counter++;
				if ($(final).length > 0) {
					changeDesc(index, selectedval);
					$("#order").removeClass("disabled");
					@if (App::isLocale('mn')) 
					$("#roomtype").find(final).find('.price').text(plus * perprice * selectedval);
					$("#roomtype").find(final).find('.perprice').text(selectedval + ' {{__("messages.room")}} - ' + numeral(perprice * selectedval).format('0,0') + '₮');
					@elseif(App::isLocale('en'))
					$("#roomtype").find(final).find('.price').text(plus * perprice * selectedval / rating);
					$("#roomtype").find(final).find('.perprice').text(selectedval + ' {{__("messages.room")}} - ' + numeral(perprice * selectedval / rating).format('0,0.00') + '$');
					@endif
				} else {
					if (counter < array.length) {
						$("#order").removeClass("disabled");
						orderData.push({ id: index, room_number: selectedval, room_id: value.id });
						$('#roomtype').prepend(string);
					}
				}
			}
			$('.price').each(function () {
				Totalsum += parseFloat($(this).text());
			});
			Totalsum += pickup_price;
			// nuat = parseFloat(Totalsum * 0.1).toFixed(2);
			var finalprice = parseFloat(Totalsum);
			@if (App::isLocale('mn')) 
				// $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
				$('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
			@elseif(App::isLocale('en'))
				// $('#nuat').html(parseFloat(nuat /'{{ $rate }}').toFixed(2) + ' $');
				$('#totalPrice').html(parseFloat(finalprice/'{{ $rate }}').toFixed(2) + ' $');
			@endif
            }
		})
	
	$.each($('#pickups').find('.pickup'), function(index,value){
		if($(this).is(":checked")){
			pickup.value = $(this).data('id');
			@if(App::isLocale('mn'))
				pickup.price =  $(this).data('price');
			@else
				pickup.price = $(this).data('price')/'{{$rate}}';
			@endif
			pickup_price += pickup.price;
			Totalsum += pickup_price;
			// var nuat = parseFloat(Totalsum * 0.1).toFixed(2);
			var finalprice = parseFloat(Totalsum);
			@if (App::isLocale('mn')) 
				// $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
				$('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
			@elseif(App::isLocale('en'))
				// $('#nuat').html( parseFloat(nuat).toFixed(2) + ' $');
				$('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
			@endif
		}
	})
	})
	

	$.each(pickups, function (index, value) {
		$('#carrent'+value.id).change(function () {
			pickup.value = $(this).data('id');
			@if(App::isLocale('mn'))
				pickup.price =  $(this).data('price');
			@else
				pickup.price = $(this).data('price')/'{{$rate}}';
			@endif
			if ($(this).is(":checked")) {
				$.each($('#pickups').find('.pickup'),function(index,data){
					if($(data).data('id') != pickup.value){
						if ($('#carrent'+$(data).data('id')).is(":checked")) {
							$('#carrent'+$(data).data('id')).attr('checked', false);
							Totalsum -= pickup_price;
							@if(App::isLocale('mn'))
								pickup_price -= $(data).data('price');
							@else
								pickup.price -= $(data).data('price')/'{{$rate}}';
							@endif
						}
					}
				})
				pickup_price += pickup.price;
				Totalsum += pickup_price;
			} else {
				Totalsum -= pickup_price;
				pickup_price -= pickup.price;
				pickup = {};
			}
			// var nuat = parseFloat(Totalsum * 0.1).toFixed(2);
			var finalprice = parseFloat(Totalsum);
			@if (App::isLocale('mn')) 
				// $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
				$('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
			@elseif(App::isLocale('en'))
				// $('#nuat').html( parseFloat(nuat).toFixed(2) + ' $');
				$('#totalPrice').html( parseFloat(finalprice).toFixed(2) + ' $');
			@endif
		});
	});

	function removeRow(index) {
		Totalsum = 0;
		var string = '.nightRoom';
		string = string.concat(index);
		var val = $("#roomtype .perprice").length;
		if (val == 0) {
			$('#nullRoom').show();
			$("#order").addClass("disabled");
		}
		$('#roomtype').find(string).remove();
		$('.price').each(function () {
			Totalsum += parseFloat($(this).text());
		});
		for (var i = 0; i < orderData.length; i++) {
			if (orderData[i].id == index) {
				orderData.splice(i, 1);
			}
		}
		Totalsum += pickup_price;
		// nuat = parseFloat(Totalsum * 0.1).toFixed(2);
		var finalprice = parseFloat(Totalsum);
		@if (App::isLocale('mn')) 
			// $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
			$('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
		@elseif(App::isLocale('en'))
			// $('#nuat').html(parseFloat(nuat).toFixed(2) + ' $');
			$('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
		@endif
		$('#night' + index).dropdown('set selected', 'selected');
	}

	function changeDesc(value, desc) {
		for (var i in orderData) {
			if (orderData[i].id == value) {
				orderData[i].room_number = desc;
				break;
			}
		}
	}

	// =============================================================================
	// - When choose the room information, show information of room in order section
	// =============================================================================

	$.each(array, function (index, value) {
		var sum = 0;
		var string = '';
		var defaultID = '.nightRoom0';
		var counter = 0;
		var defaultclass = '';
		var totalprice = 0;
		var nuat = 0;
		var rating = "{{$rate}}";
		$("#order").addClass("disabled");
		var perprice = $('#price' + index).data('price');
		$('#night' + index).on('change', function () {
			if (this.value == 'selected') {
				removeRow(index);
			}
			else {
				Totalsum = 0;
				var dayprice = perprice * this.value;
				$('#nullRoom').hide();
				@if (App::isLocale('mn')) 
					string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
							<div class="right floated content " >\
								<button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
								{{__("messages.remove")}}\
								</button>\
							</div>\
							<div class="content">\
								<h2 class="ui sub header" >\
								'+ value.name + '\
								</h2>\
								<span class="perprice">'+ this.value + ' {{__("messages.room")}} - ' + numeral(perprice * this.value).format('0,0') + '₮</span>\
								<span class="price" style="display:none">'+ plus * perprice * this.value + '</span>\
							</div>\
							</div>';
				@elseif(App::isLocale('en'))
					string = '<div class="item nightRoom' + index + '" id="#nightRoom' + index + '">\
							<div class="right floated content " >\
								<button class="small ui button" onclick="removeRow('+ index + ');" id="removeRoom">\
								{{__("messages.remove")}}\
								</button>\
							</div>\
							<div class="content">\
								<h2 class="ui sub header" >\
								'+ value.name + '\
								</h2>\
								<span class="perprice">'+ this.value + ' {{__("messages.room")}} - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$</span>\
								<span class="price" style="display:none">'+ parseFloat(plus * perprice * this.value / rating).toFixed(2) + '</span>\
							</div>\
							</div>';
				@endif
		var className = '.nightRoom';
		var final = className.concat(index);
		if (final == defaultID) {
			defaultclass = 'nightRoom';
			var concatted = defaultclass.concat(index);
			defaultID = final;
			var val = $("div").hasClass(concatted);
			if (val == true) {
				changeDesc(index, this.value);
				$("#order").removeClass("disabled");
				@if (App::isLocale('mn')) 
					$("#roomtype").find(final).find('.price').text(plus * perprice * this.value);
					$("#roomtype").find(final).find('.perprice').text(this.value + ' {{__("messages.room")}} - ' + numeral(perprice * this.value).format('0,0') + '₮');
				@elseif(App::isLocale('en'))
					$("#roomtype").find(final).find('.price').text(plus * perprice * this.value / rating);
					$("#roomtype").find(final).find('.perprice').text(this.value + ' {{__("messages.room")}} - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$');
				@endif
                }
                else {
					$("#order").removeClass("disabled");
					orderData.push({ id: index, room_number: this.value, room_id: value.id });
					$('#roomtype').prepend(string);
				}
            }
            else {
				defaultID = final;
				counter++;
				if ($(final).length > 0) {
					changeDesc(index, this.value);
					$("#order").removeClass("disabled");
					@if (App::isLocale('mn')) 
						$("#roomtype").find(final).find('.price').text(plus * perprice * this.value);
						$("#roomtype").find(final).find('.perprice').text(this.value + ' {{__("messages.room")}} - ' + numeral(perprice * this.value).format('0,0') + '₮');
					@elseif(App::isLocale('en'))
						$("#roomtype").find(final).find('.price').text(plus * perprice * this.value / rating);
						$("#roomtype").find(final).find('.perprice').text(this.value + ' {{__("messages.room")}} - ' + numeral(perprice * this.value / rating).format('0,0.00') + '$');
					@endif
				} else {
					if (counter < array.length) {
						$("#order").removeClass("disabled");
						orderData.push({ id: index, room_number: this.value, room_id: value.id });
						$('#roomtype').prepend(string);
					}
				}
			}
	$('.price').each(function () {
		Totalsum += parseFloat($(this).text());
	});
	Totalsum += pickup_price;
	// nuat = parseFloat(Totalsum * 0.1).toFixed(2);
	var finalprice = parseFloat(Totalsum);
	@if (App::isLocale('mn')) 
		// $('#nuat').html(numeral(nuat).format('0,0') + ' ₮');
		$('#totalPrice').html(numeral(finalprice).format('0,0') + ' ₮');
	@elseif(App::isLocale('en'))
		// $('#nuat').html(parseFloat(nuat).toFixed(2) + ' $');
		$('#totalPrice').html(parseFloat(finalprice).toFixed(2) + ' $');
	@endif
            }
        })
    })

	// =============================================================================
	//  - Get data of search 
	// =============================================================================

	var roomNumber;
	var people;
	var startDate;
	var endDate;
	var searchPlace;

	searchPlace = '{{$place}}';
	if (searchPlace == 'undefined' || !searchPlace) {
		$('.datalocation input').val('Ulaanbaatar, Mongolia');
	}
	else {
		$('.datalocation input').val(searchPlace);
	}


	endDate = moment('{{  $enddate  }}').format('L');
	startDate = moment('{{  $startdate  }}').format('L');
	var plus = moment.duration(moment(endDate).diff(moment(startDate))).days();;
	$('#difference').html(plus);

	if ('{{ $peoplenumber }}' >= 15) {
		people = $('#selectedPeople').val();
	} else {
		people = $('.selectedPeople option:selected').val();
	}

	if ('{{ $roomnumber }}' >= 15) {
		roomNumber = $('#selectedRoom').val();
	} else {
		roomNumber = $('.selectedRoom option:selected').val();
	}

	var plus0 = $('#plus0');
	var minus0 = $('#minus0');
	var selectedRoom = $('#selectedRoom');
	plus0.click(function (e) {
		var value = parseFloat(selectedRoom.val());
		if (!value) {
			value = 0;
		}
		value = value + 1;
		selectedRoom.val(value);
		roomNumber = value;
		e.preventDefault();
	});
	minus0.click(function (e) {
		var value = parseFloat(selectedRoom.val());
		if (value < 16) {
			$('.selectedRoom').dropdown('set selected', 14);
			$('.selectedRoom').css("display", "");
			$('.people').css("display", "none");
		} else {
			if (value > 1) {
				value = value - 1;
			}
			selectedRoom.val(value);
			roomNumber = value;
		}
		e.preventDefault();
	});

	var plus1 = $('#plus1');
	var minus1 = $('#minus1');
	var selectedPeople = $('#selectedPeople');
	plus1.click(function (e) {
		var value = parseFloat(selectedPeople.val());
		if (!value) {
			value = 0;
		}
		value = value + 1;
		selectedPeople.val(value);
		people = value;
		e.preventDefault();
	});
	minus1.click(function (e) {
		var value = parseFloat(selectedPeople.val());
		if (value < 16) {
			$('.selectedPeople').dropdown('set selected', 14);
			$('.selectedPeople').css("display", "");
			$('.room').css("display", "none");
		} else {
			if (value > 1) {
				value = value - 1;
			}
			selectedPeople.val(value);
			people = value;
		}
		e.preventDefault();
	});

	$("#selectedRoom").keyup(function () {
		var value = $(this).val();
		roomNumber = value;
	});

	$("#selectedPeople").keyup(function () {
		var value = $(this).val();
		people = value;
	});

	$(".selectedPeople").change(function () {
		if ($(this).val() === "more") {
			$('.selectedPeople').css("display", "none");
			$('.room').css("display", "");
			$('#selectedPeople').val(15);
			people = 15;
		} else {
			people = $(this).val();
		}
	});

	$(".selectedRoom").change(function () {
		if ($(this).val() === "more") {
			$('.selectedRoom').css("display", "none");
			$('#selectedRoom').val(15);
			$('.people').css("display", "");
			roomNumber = 15;
		} else {
			roomNumber = $(this).val();
		}
	});
	$('#reservation').daterangepicker({
		"autoApply": true,
		minDate: '<?php echo date("m/d/Y") ?>',
		endDate: endDate,
		dateLimitMin: {
			days: 1
		},
		startDate: startDate,
		"showCustomRangeLabel": true,
		"alwaysShowCalendars": true,
		"opens": "center"
	}, function (start, end, label) {
		startDate = start.format('L');
		endDate = end.format('L');
	});
	roomNumber = '{{$roomnumber}}';

	var perNum = '{{$peoplenumber}}';
	$('#selectedPeople option').each(function () {
		if ($(this).val() == perNum) {
			$(this).prop("selected", true);
			people = perNum
		}
	});

	// =============================================================================
	//  - Pass data of result to search function in SearchController
	// =============================================================================

	$("#searchButton").click(function () {
		$('#searchButton').addClass('loading');
		if (!people) {
			people = 2;
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		})
		searchPlace = $('#searchplace').val();
		$.get('search?roomnumber=' + roomNumber + '&peoplenumber=' + people + '&startdate=' + startDate + '&enddate=' + endDate + '&place=' + searchPlace)
			.success(function (data) {
				window.location = "{{URL::to('searchresult')}}";
			})
			.error(function (jqXHR, textStatus, errorThrown) {
				if (textStatus == 'error') {
					alert(errorThrown);
				}
			});
	});

	// =============================================================================
	//  - Pass data of order to save order function in OrderController
	// =============================================================================

	$("#order").click(function () {
		$('#order').addClass('loading disabled');
		$.ajax({
			type: 'POST',
			url: '{{ url("order") }}',
			data: { 'order_pickup': pickup.value, 'order_startdate': moment(startDate).format('YYYY-MM-DD'), 'order_enddate': moment(endDate).format('YYYY-MM-DD'), 'order_hotelid': '{{$hotel->id}}', 'order_roomdata': orderData, '_token': '{{ csrf_token() }}' },
		}).done(function (data) {
			if (data.success == true) {
				window.location = "{{ url('order/card')}}";
			}
		});
	});

</script>
@endpush