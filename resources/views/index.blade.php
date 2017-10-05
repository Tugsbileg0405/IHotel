@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="owl-carousel home-carousel">
    @if ($slides->count() > 0)
        @foreach ($slides as $slide)
            <div class="item" style="background-image: url({{ asset($slide->photo) }})"></div>
        @endforeach
    @else
        <div class="item" style="background-image: url({{ asset('img/uploads/slides/default.jpg') }})"></div>
    @endif
</div>
<div id="main-search" style="top: 33vh">
	<div class="ui stackable container">
		<div id="context2">
			<div class="ui stackable secondary menu">
				<a class="item active" data-tab="hotel">
					<i class="hotel icon"></i>{{ __('messages.Hotel') }}
				</a>
				<a target="_blank" class="item tab-aspac">
					<i class="globe icon"></i>{{ __('messages.Amsterdam') }}
				</a>
				<a href="https://www.booking.com/?aid=1336206" target="_blank" class="item">
					<i class="world icon"></i>Booking.com
				</a>
				<a href="https://www.agoda.com/?cid=1761533" target="_blank" class="item">
					<i class="world icon"></i>Agoda.com
				</a>
				<a href="{{ url('posts') }}" class="item">
					<i class="plane icon"></i>{{ __('messages.Travel Inspiration') }}
				</a>
			</div>
			<form class="ui form active tab segment" data-tab="hotel" action="{{ url('searchresult') }}" method="POST">
				<div class="ui grid stackable">
					<div class="four wide column">
						<div class="local example">
							<div class="ui search">
								<div class="ui fluid left icon input datalocation">
									<input class="prompt" type="text" name="place" id="searchplace"  data-content="{{ __('messages.Write your destination of travel') }}"  placeholder="{{ __('messages.Destination') }}">
									<i class="marker icon"></i>
								</div>
								<div class="results"></div>
							</div>
						</div>
					</div>
					<div class="four wide column">
						<div class="ui page stackable">
							<form class="ui form">
								<div class="ui fluid left icon input">
									<input type="text" name="reservation"
									id="reservation" placeholder="mm/dd/yyyy - mm/dd/yyyy"
									value=""/>
									<i class="calendar icon"></i>
								</div>
							</form>
						</div>
					</div>
					<div class="three wide column select-room">
						<div class="people" style="display:none">
							<a class="plus" href="#" id="plus">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="roomnumber" placeholder="{{ __('messages.Rooms') }}" id="selectedRoom" min="1" value="15">
							<a class="minus" href="#" id="minus">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="ui fluid search dropdown selectedRoom">
							<option value="">{{ __('messages.Rooms') }}</option>
							@for ($i=1; $i< 15; $i++)
							<option value="{{ $i }}" @If($i == 1) selected @endif>{{ $i }} {{ __('messages.room') }}</option>
							@endfor
							<option value="more">{{ __('messages.More') }}</option>
						</select>
					</div>
					
					<div class="three wide column select-room">
						<div class="room" style="display:none">
							<a class="plus" href="#" id="plus1">
								<i class="chevron up icon"></i>
							</a>
							<input type="number" name="peoplenumber" placeholder="{{ __('messages.People') }}" id="selectedPeople" min="1" value="15">
							<a class="minus" href="#" id="minus1">
								<i class="chevron down icon"></i>
							</a>
						</div>
						<select class="ui fluid search dropdown selectedPeople">
							<option value="">{{ __('messages.People') }}</option>
							@for ($i=1; $i< 15; $i++)
							<option value="{{ $i }}" @If($i == 2) selected @endif>{{ $i }} {{ __('messages.people') }}</option>
							@endfor
							<option value="more">{{ __('messages.More') }}</option>
						</select>
				   </div>
					<div class="two wide search-btn column">
						<div class="fluid ui red button" id="searchButton" data-token="{{ csrf_token() }}">
							{{ __('messages.Search') }}
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@if (App::isLocale('mn'))
	@if ($informations->count() > 0)
		<section class="cd-hero">
			<ul class="cd-hero-slider autoplay">
				@foreach ($informations as $key => $information)
					<li class="{{ $key == 0 ? 'selected':'' }}">
						<div class="cd-full-width">
							@if (App::isLocale('en'))
								<h2>{{ $information->subtitle_en }}</h2>
								{!!  $information->content_en !!}
							@elseif (App::isLocale('mn'))
								<h2>{{ $information->subtitle }}</h2>
								{!!  $information->content !!}
							@endif
						</div>
					</li>
				@endforeach
			</ul>
			<div class="cd-slider-nav">
				<nav>
					<span class="cd-marker item-1"></span>
					<ul>
						@foreach ($informations as $key => $information)
							<li class="{{ $key == 0 ? 'selected':'' }}">
								<a href="#">
									<img src="{{ asset($information->image) }}">
									<label style="word-spacing: 9999px">
										@if (App::isLocale('en'))
											{{ $information->title_en }}
										@elseif (App::isLocale('mn'))
											{{ $information->title }}
										@endif
									</label>
								</a>
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</section>
	@endif
@endif
<div class="back-silver">
	<div class="ui container">
		<div class="page-title">
			<div id="ihotel" class="ui stackable container ">
				<div class="sixteen wide center aligned column">
					<h4 id="contact">{{ __('messages.Login to control system') }}</h4>
				</div>
			</div>
		</div>
		<div class="ui stackable grid">
			<div class="three column row">
				<div class="center aligned column">
					<div class="ui segment ">
						<div class="login-content">
							<div class="content">
								<img class="ui tiny centered image" src="img/marker.png">
							</div>
							<div class="content">
								<h4 class="ui sub header">{{ __('messages.Add hotel') }}</h4>
							</div>
							<div class="extra content">
								<a href="{{ url('hotel/create') }}" class="ui primary button">{{ __('messages.Add') }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="center aligned column">
					<div class="ui segment ">
						<div class="login-content">
							<div class="content">
								<img class="ui tiny centered image" src="img/room.png">
							</div>
							<div class="content">
								<h4 class="ui sub header">{{ __('messages.Room Control System') }}</h4>
							</div>
							<div class="extra content">
								<a href="{{ url('profile/hotels') }}" class="ui primary button">{{ __('messages.Login') }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="center aligned column">
					<div class="ui segment ">
						<div class="login-content">
							<div class="content">
								<img class="ui tiny centered image" src="img/hotel.png">
							</div>
							<div class="content">
								<h4 class="ui sub header">{{ __('messages.Hotel Booking System') }}</h4>
							</div>
							<div class="extra content">
								<a href="#" class="ui primary button">{{ __('messages.Login') }}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="special-content">
	<div class="ui container">
		<div class="ui stackable grid">
			<div class="three column row">
				@if ($firstPost)
					<div class="column">
						<h4 class="ui centered header">
							<i class="ui globe icon"></i>{{ App::isLocale('mn') ? $firstPost->category->name : $firstPost->category->name_en }}
						</h4>
						<div class="ui special raised link cards">
							<div class="ui fluid card">
								<div class="blurring dimmable image">
									<div class="ui inverted dimmer">
										<div class="content">
											<div class="center">
												<a class="ui primary button" href="{{ url('post', $firstPost->id) }}">{{ __('messages.Read More') }}</a>
											</div>
										</div>
									</div>
									<img src="{{ asset(unserialize($firstPost->photos)[0]) }}">
								</div>
								<div class="content footer-news">
									<a class="header" href="{{ url('post', $firstPost->id) }}">{{ $firstPost->title }}</a>
									<div class="meta">
										<span class="date">
											<i class="ui calendar icon"></i>
											{{ date('Y-m-d', strtotime($firstPost->created_at)) }}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
				@if ($secondPost)
					<div class="column">
						<h4 class="ui centered header">
							<i class="ui map icon"></i>{{ App::isLocale('mn') ? $secondPost->category->name : $secondPost->category->name_en }}
						</h4>
						<div class="ui special raised link cards">
							<div class="ui fluid card">
								<div class="blurring dimmable image">
									<div class="ui inverted dimmer">
										<div class="content">
											<div class="center">
												<a class="ui primary button" href="{{ url('post', $secondPost->id) }}">{{ __('messages.Read More') }}</a>
											</div>
										</div>
									</div>
									<img src="{{ asset(unserialize($secondPost->photos)[0]) }}">
								</div>
								<div class="content footer-news">
									<a class="header">{{ $secondPost->title }}</a>
									<div class="meta">
										<span class="date">
											<i class="ui calendar icon"></i>
											{{ date('Y-m-d', strtotime($secondPost->created_at)) }}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
				@if ($hotel)
					<div class="column">
						<h4 class="ui centered header">
							<i class="ui tags icon"></i>{{ __('messages.Sale') }}
						</h4>
						<div class="ui special raised link cards">
							<div class="ui fluid card">
								<div class="blurring dimmable image">
									<div class="ui inverted dimmer">
										<div class="content">
											<div class="center">
												<a class="ui primary button" href="{{ url('search/hotel', $hotel->id) }}">{{ __('messages.Read More') }}</a>
											</div>
										</div>
									</div>
									<div class="ui fluid image">
										<div class="ui red right ribbon label">
											{{ $room->price }}₮
										</div>
										<img src="{{ asset($hotel->cover_photo) }}">
									</div>
								</div>
								<div class="content footer-news">
									<a class="header">{{ $hotel->name }}
									@for ($i=0;$i<$hotel->star;$i++)
										<i class="ui star icon"></i>
									@endfor
									</a>
									<div class="meta">
										<span class="date">
											<i class="marker icon"></i>
											{{ $hotel->address }}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
@if ($comments->count() > 0)
	<div class="people-say">
		<div class="ui container">
			<div class="ui two column centered stackable grid">
				<div class="column">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								@foreach ($comments as $comment)
									<li class="artive">
										<article>
											<div id="owl">
												<div class="large-12 columns testimonial">
													<div class="quote">
														<p>{{ $comment->content }}</p>
													</div>
													<div class="student">
														<div class="photo round-image">
															<img class="ui medium circular image" src="{{ asset($comment->photo) }}">
														</div>
														<p>{{ $comment->name }}</p>
														<p>{{ $comment->description }}</p>
													</div>
												</div>
											</div>
										</article>
									</li>
								@endforeach
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
@endif

<div id="places"></div>
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDssMBUJqsqfD7XE5DKCbk6jK9R1C81MH0&libraries=places"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script type="text/javascript">
    $('.home-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        items: 1,
        dots: false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        mouseDrag: false,
        autoplayTimeout: 6000,
    })
    $('.flexslider').flexslider({
        animation: "slide",
        controlsContainer: $(".custom-controls-container"),
        customDirectionNav: $(".custom-navigation a"),
    });
    var cityName = 'Ulaanbaatar'; // Хотын нэр хадгалж байгаа хувьсагч
	$('#searchplace').val('Ulaanbaatar, Mongolia');
	function initialize() {
		var input = document.getElementById('searchplace');


		var autocomplete = new google.maps.places.Autocomplete(input,{ types: ['(cities)']});
		google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
        });

		let autocompleteService = new google.maps.places.AutocompleteService();
		let request = {input: "Ulaanbaatar, Mongolia"};
		autocompleteService.getPlacePredictions(request, (predictionsArr, placesServiceStatus) => {
				var request = {
                    placeId: predictionsArr[0].place_id
                };
				var service = new google.maps.places.PlacesService(document.getElementById('places'));
				service.getDetails(request, function(place, status) {
					if (status === google.maps.places.PlacesServiceStatus.OK) {
                        $('#searchplace').val(place.formatted_address);
                        cityName = place.address_components[0].long_name;
					}
				});
		});

        // Хот солигдох эвэнт
        autocomplete.addListener('place_changed', function() {
            let place = autocomplete.getPlace();
            cityName = place.address_components[0].long_name;
        });

   }
   google.maps.event.addDomListener(window, 'load', initialize);
   var searchPlace;
   
   $('.datalocation input')
      .popup({
        on: 'focus'
      });
	var roomNumber;
	var people;
	var startDate;
	var endDate;
	endDate = moment().add(1, 'days').format('L');
	startDate = moment().format('L');
	
	roomNumber = $('.selectedRoom').val();
	people =$('.selectedPeople').val();
	
	var plus = $('#plus');
	var minus = $('#minus');
	var selectedRoom = $('#selectedRoom');
	plus.click(function(e) {
		var value = parseFloat(selectedRoom.val());
		if(!value){
			value = 0;
        }
		value = value + 1;
		selectedRoom.val(value);
		roomNumber = value;
		$('#selectedPeople').val(value);
		people = value;
		e.preventDefault();
	});		
	minus.click(function(e) {
		var value = parseFloat(selectedRoom.val());
		if(value < 16){
			$('.selectedRoom').dropdown('set selected', 14);
			$('.selectedRoom').css("display","");
			$('.people').css("display","none");
		}else{	
			if (value > 1) {
				value = value - 1;
			}
			selectedRoom.val(value);
			roomNumber = value;
			$('#selectedPeople').val(value);
			people = value;
		}
		e.preventDefault();
	});

	var plus1 = $('#plus1');
	var minus1 = $('#minus1');
	var selectedPeople = $('#selectedPeople');
	plus1.click(function(e) {
		var value = parseFloat(selectedPeople.val());
		if(!value){
			value = 0;
        }
		value = value + 1;
		selectedPeople.val(value);
		people = value;
		e.preventDefault();
	});		
	minus1.click(function(e) {
		var value = parseFloat(selectedPeople.val());
		if(value < 16){
			$('.selectedPeople').dropdown('set selected', 14);
			$('.selectedPeople').css("display","");
			$('.room').css("display","none");
		}else{	
			if (value > 1) {
				value = value - 1;
			}
			selectedPeople.val(value);
			people = value;
		}
		e.preventDefault();
	});
	$( "#selectedRoom" ).keyup(function() {
		var value = $( this ).val();
		roomNumber = value;
		$('#selectedPeople').val(value);
		people = value;
	})
	$( "#selectedPeople" ).keyup(function() {
		var value = $( this ).val();
		people = value;
	})
	$( ".selectedPeople" ).change(function() {
		if($(this).val() === "more"){
			$('.selectedPeople').css("display","none");
			$('.room').css("display","");
			people = 15;
		}else{
			$('.selectedPeople').css("display","");
			$('.room').css("display","none");
			people = $(this).val();
		}
	});

	$( ".selectedRoom" ).change(function() {
		$('.selectedPeople').dropdown('set selected', $(this).val());
		if($(this).val() === "more"){
			$('.selectedRoom').css("display","none");
			$('.people').css("display","");
			roomNumber = 15;
		}else{
			roomNumber = $(this).val();
		}
	});

	$('#reservation').daterangepicker({
	endDate: moment().add(1, 'days'),
	minDate: '<?php echo date("m/d/Y") ?>',
    "opens": "center",
    "autoApply": true,
    dateLimitMin: {
        days: 1
    },
    "showCustomRangeLabel": true,
    "alwaysShowCalendars": true,
    applyClass: 'ui positive button' , 
    cancelClass : 'ui button',
    locale: { cancelLabel: 'Хаах',applyLabel: 'Сонгох' }  
    }, function(start, end, label) {
        startDate = start.format('L');
        endDate = end.format('L');
    });
    
    $("#searchButton").click(function(){
        $('#searchButton').addClass('loading');
        if(!people){
            people = 2;
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        })
        searchPlace = $('#searchplace').val();
        if (searchPlace == 'Ulaanbaatar, Mongolia') {
            $.get('search?roomnumber=' + roomNumber + '&peoplenumber=' + people + '&startdate=' + startDate + '&enddate=' + endDate + '&place=' + searchPlace)
            .success(function (data) {
                window.location = "{{ URL::to('searchresult') }}";
            })
            .error(function(jqXHR, textStatus, errorThrown){
                if (textStatus == 'error'){
                        alert(errorThrown);
                }
            });
        }
        else if (searchPlace == 'Amsterdam, Netherlands') {
            $.get('search?roomnumber=' + roomNumber + '&peoplenumber=' + people + '&startdate=' + startDate + '&enddate=' + endDate + '&place=' + searchPlace)
            .success(function (data) {
                window.location = "{{ URL::to('searchresult') }}";
            })
            .error(function(jqXHR, textStatus, errorThrown){
                if (textStatus == 'error'){
                        alert(errorThrown);
                }
            });
        }
        else {
            startDate = moment(startDate).format('YYYY-MM-DD');
            endDate = moment(endDate).format('YYYY-MM-DD');
            var cityNameForm = new FormData();
            cityNameForm.append('city', cityName);
            cityNameForm.append('_token', '{{ csrf_token() }}');
		    $.ajax({
				type: "POST",
				url: "{{ url('citycode') }}",
	           	data: cityNameForm,
				contentType: false,
				processData: false,
	           	success: function(data) {
                    window.open('https://www.agoda.com/pages/agoda/default/DestinationSearchResult.aspx?cid=1761533&pcs=1&city=' + data.code + '&checkIn=' + moment(startDate).format('YYYY-MM-DD') + '&checkOut=' + moment(endDate).format('YYYY-MM-DD') + '&los=1&rooms=' + roomNumber + '&adults=' + people + '&children=0');
	       		},
				error: function(data){
                    window.open('https://www.agoda.com/?cid=1761533');
				}
			});
        }
    });
</script>
@endpush
