<div class="five wide column">
	<div class="ui fluid vertical menu blog-right-menu">
		@foreach ($categories as $category)
			<a href="{{ url('category', $category->id) }}" class="item">
				@if (App::isLocale('en'))
					{{ $category->name_en }}
				@elseif (App::isLocale('mn'))
					{{ $category->name }}
				@endif
			</a>
		@endforeach
	</div>
    <a class="ui green button" href="{{ url('profile/posts/create') }}">
        <i class="plus icon"></i> {{ __('messages.Add post') }}
    </a>
	<h4 class="ui header">{{ __('messages.Book a Hotel') }}</h4>
	<div class="right-search">
		<form class="ui form">
			<div class="column">
				<div class="local example">
					<div class="ui search">
						<div class="ui fluid left icon input">
							<input class="prompt" type="text" id="searchplace" value="{{ $place ? $place : 'Ulaanbaatar, Mongolia' }}" placeholder="{{ __('messages.Destination') }}">
							<i class="marker icon"></i>
						</div>
						<div class="results"></div>
					</div>
				</div>
			</div>
			<div class="ui grid">
				<div class="column row hotel-date">
					<div class="column">
						<form class="ui form">
							<div class="ui fluid left icon input">
								<input type="text" name="reservation"
								id="startDate"
								value=""/>
								<i class="calendar icon"></i>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="ui grid">
				<div class="two column row hotel-number">
					<div class="people-number-left column">
						<div class="ui form">
							 <div class="people">
                            	<a class="plus" href="#" id="plus">
                            	    <i class="chevron up icon"></i>
                            	</a>
								<input type="number" name="roomnumber" id="selectedRoom" min="1" placeholder="{{ __('messages.Rooms') }}">
								<a class="minus" href="#" id="minus">
                                    <i class="chevron down icon"></i>
                                </a>
                             </div>
						</div>
					</div>
					<div class="people-number-right column">
						<div class="ui form">
							<div class="room">
                                <a class="plus" href="#" id="plus1">
                                    <i class="chevron up icon"></i>
                                </a>
								<input type="number" name="peoplenumber" id="selectedPeople" min="1" placeholder="{{ __('messages.People') }}">
								 <a class="minus" href="#" id="minus1">
                                     <i class="chevron down icon"></i>
                                 </a>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<button class="ui mini-search fluid red button" id="searchButton" type="submit">{{ __('messages.Search') }}</button>
		</form>
	</div>
	@if ($mostPosts->count() > 0)
		<h4 class="ui header">{{ __('messages.The most viewed') }}</h4>
		@foreach ($mostPosts as $mostPost)
			<div class="ui fluid card">
				<a class="image" href="{{ url('post', $mostPost->id) }}">
					<img src="{{ asset(unserialize($mostPost->photos)[0]) }}">
				</a>
				<div class="content">
					<a class="header" href="{{ url('post', $mostPost->id) }}">{{ $mostPost->title }}</a>
					<div class="meta">
						<a class="time" href="{{ url('category', $mostPost->category->id) }}">
							@if (App::isLocale('en'))
								{{ $mostPost->category->name_en }}
							@elseif (App::isLocale('mn'))
								{{ $mostPost->category->name }}
							@endif
						</a>
					</div>
				</div>
			</div>
		@endforeach
	@endif
</div>
@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW4iZ6gWxhzJOE3Vi4wvHZcTH0vgdDqk&libraries=places&callback=initMap"
         async defer></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script>
		function initMap() {
			var input = document.getElementById('searchplace');
			var autocomplete = new google.maps.places.Autocomplete(input,{ types: ['(cities)']});
		}

		var searchPlace;
		var roomNumber;
		var people;
		var startDate;
		var endDate;

		endDate = '{{$enddate}}';
		startDate = '{{$startdate}}';
		$('#startDate').daterangepicker({
			endDate: endDate,
			startDate: startDate,
			"opens": "center",
			"autoApply": true,
			 dateLimitMin: {
            days: 1
			},
			minDate: '<?php echo date("m/d/Y") ?>',
            "showCustomRangeLabel": true,
            "alwaysShowCalendars": true,
            applyClass: 'ui positive button' , 
            cancelClass : 'ui button',
            locale: { cancelLabel: 'Хаах',applyLabel: 'Сонгох' }  
        }, function(start, end, label) {
                        startDate = start.format('L');
                        endDate = end.format('L');
            });
        
        roomNumber = $('#selectedRoom').val();
        people =$('#selectedPeople').val();

        $( "#selectedRoom" ).keyup(function() {
            var value = $( this ).val();
            roomNumber = value;
        })

        $( "#selectedPeople" ).keyup(function() {
            var value = $( this ).val();
            people = value;
        })

        
            
    $("#searchButton").click(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        })
        
        searchPlace = $('#searchplace').val();

        $.get(' {{url("search")}}' + '?roomnumber=' + roomNumber + '&peoplenumber='+ people + '&startdate=' + startDate + '&enddate='+ endDate + '&place=' + searchPlace, function (data) {
            window.location="{{URL::to('searchresult')}}";
        });
    });

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
        e.preventDefault();
    });     
    minus.click(function(e) {
        var value = parseFloat(selectedRoom.val());
        if (value > 1) {
            value = value - 1;
        }
        selectedRoom.val(value);
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
        e.preventDefault();
    });     
    minus1.click(function(e) {
        var value = parseFloat(selectedPeople.val());
        if (value > 1) {
            value = value - 1;
        }
        selectedPeople.val(value);
        e.preventDefault();
    });
</script>
@endpush
