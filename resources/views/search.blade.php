@extends('layouts.app') 

@section('title', 'iHotel') 

@section('content')
<div class="search-result" id="result">
	<div class="box">
		<div class="center">
			<div id="demo" class="box jplist">
				<div class="search-filter">
					<div class="ui stackable search-body container">
						<div class="ui header-search stackable grid">
							<div class="four wide column">
								<div class="local example">
									<div class="ui search searhlocation">
										<div class="ui fluid left icon input datalocation">
                                            @If(App::isLocale('mn'))
											<input class="prompt" type="text" id="searchplace" data-content="{{ __('messages.Write your destination of travel') }}" placeholder="{{ __('messages.Destination') }}">
                                            @else
                                            <input class="prompt" disabled type="text" placeholder="{{ __('messages.Destination') }}">
                                            @endif
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
                                        <a class="plus" href="#" id="plus">
                                            <i class="chevron up icon"></i>
                                        </a>
                                        <input type="number" name="roomnumber" placeholder="{{ __('messages.Rooms') }}" id="selectedRoom" min="1" value="{{ $roomnumber ? $roomnumber : 15 }}">
                                        <a class="minus" href="#" id="minus">
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
                                        <input type="number" name="peoplenumber" placeholder="{{ __('messages.People') }}" id="selectedPeople" min="1" value="{{ $peoplenumber ? $peoplenumber : 15 }}">
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
						<div class="ui stackable grid">
							<div class="three wide column">
								<h4 class="ui header">{{ __('messages.Search results') }}
									<div class="sub header">
										{{ __('messages.Total') }}: <span id="resultLength">0</span> {{ __('messages.found') }}
									</div>
								</h4>
							</div>
							<div class="five wide column">
								<div class="ui computer tablet mobile grid" style="padding:10px 0">
									<div class="four wide column" style="text-align:right">
										<div id="minVal">
										</div>
									</div>
									<div class="eight wide column">
										<div id="slider-snap">
										</div>
									</div>
									<div class="four wide column">
										<div id="maxVal">
										</div>
									</div>
								</div>
							</div>
							<div class="two wide column">
								<div class="ui compact  dropdown star-filter">
									<input name="language" type="hidden">
									<div class="text">Star</div>
									<div class="menu ui transition hidden">
										<div class="item" data-value=""><i class="icon yellow star"></i>{{ __('messages.Total star') }}</div>
										<div class="item" data-value="1"><i class="icon yellow star"></i>1</div>
										<div class="item" data-value="2">
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i> 2
										</div>
										<div class="item" data-value="3">
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i> 3
										</div>
										<div class="item" data-value="4">
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i> 4
										</div>
										<div class="item" data-value="5">
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i>
											<i class="icon yellow star"></i> 5
										</div>
									</div>
								</div>
							</div>
							<div class="three wide column">
									<div class="ui computer tablet mobile grid" style="padding-left:10px">
									<div class="sixteen wide column" style="text-align:center">
										<div id="user-rating-value">
										</div>
										<div id="user-rating-slider">
										</div>
									</div>
								</div>
							</div>
							<div class="right aligned three wide column">
								<div class="ui breadcrumb">
									<a class="section" href="{{url('/')}}">{{ __('messages.Home') }}</a>
									<span class="divider">/</span>
									<div class="active section">{{ __('messages.Search results') }}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ui stackable search-content container">
				<div class="ui stackable two column grid">
					<div class="row">
						<div class="search-result column">
							<div class="ui inverted dimmer" id="loader">
								<div class="ui small text loader"></div>
							</div>
							<div class="list box text-shadow searchResult" id="searchResult">
							</div>
							<div class="box text-shadow align-center" id="noresult" style="display:none">
								<div class="ui negative message">
									<div class="ui centered header">
										{{ __('messages.Not found') }}
									</div>
								</div>
							</div>
                            <div class="box text-shadow align-center" id="errorresult" style="display:none">
								<div class="ui negative message">
									<div class="ui centered header">

									</div>
								</div>
							</div>
							<div class="room-page" id="pagination">
							</div>
						</div>
						<div class="search-google-map column">
							<div class="ihotel-google-map column" id="map" style="height:90vh">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection @push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDssMBUJqsqfD7XE5DKCbk6jK9R1C81MH0&sensor=false&libraries=places"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<link href="{{asset('dist/css/jplist.core.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{asset('dist/js/jplist.core.min.js') }}"></script>
<link href="{{asset('dist/css/jplist.jquery-ui-bundle.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
<script src="{{asset('dist/js/jplist.jquery-ui-bundle.min.js') }}"></script>
<script src="{{asset('dist/js/jplist.filter-dropdown-bundle.min.js') }}"></script>
<link href="{{asset('css/simplepagination.css') }}" rel="stylesheet" type="text/css" />
<script src="{{asset('js/simplepagination.js') }}"></script>
<script src="{{ asset('dist/js/map-icons.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
         $('.search-google-map').scrollToFixed({
            marginTop: $('.search-result').offset().top ,
            limit: function() {
                var limit = $('#result').height() - $('.search-result').offset().top ;
                return limit;
            },
            zIndex: 1,
        });
        $('.search-google-map').trigger('resize');
    });
</script>
<script type="text/javascript">
	// =============================================================================
	//	- Get all data of search  
	// =============================================================================
	var roomNumber;
	var people;
	var startDate;
	var endDate;
	var searchPlace;
	var valueArray = [];
	var ratingArray = [];
    var markers = [];
    var allHotels = [];
	endDate = '{{$enddate}}';
	startDate = '{{$startdate}}';
	searchPlace = '{{$place}}';

	if (searchPlace == 'undefined' || !searchPlace) {
		$('.datalocation input').val('Ulaanbaatar, Mongolia');
	}
	else {
		$('.datalocation input').val(searchPlace);
	}
    
    if('{{ $peoplenumber }}' >= 15){
        people =$('#selectedPeople').val();
    }else{
        people =$('.selectedPeople option:selected').val();
    }
    
    if('{{ $roomnumber }}' >= 15){
        roomNumber = $('#selectedRoom').val();
    }else{
        roomNumber = $('.selectedRoom option:selected').val();
    }
	
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

	$("#selectedRoom").keyup(function () {
        var value = $( this ).val();
		roomNumber = value;
		$('#selectedPeople').val(value);
		people = value;
	});

	$("#selectedPeople").keyup(function () {
        var value = $( this ).val();
		people = value;
	});

    $( ".selectedPeople" ).change(function() {
		if($(this).val() === "more"){
			$('.selectedPeople').css("display","none");
			$('.room').css("display","");
            $('#selectedRoom').val(15);
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
            $('#selectedRoom').val(15);
            $('#selectedPeople').val(15);
			roomNumber = 15;
		}else{
			roomNumber = $(this).val();
			
		}
	});

    $('#reservation').daterangepicker({
		autoApply: true,
		endDate: endDate,
        dateLimitMin: {
            days: 1
        },
		startDate: startDate,
		minDate: '<?php echo date("m/d/Y") ?>',
        opens: 'center',    
    }, function(start, end, label) {
            startDate = start.format('L');
            endDate = end.format('L');
        });

    roomNumber = '{{$roomnumber}}';

    // =============================================================================
    //  - Show google map 
    // =============================================================================

    var mapCenter = { 
        lat: 47.913138,
        lng: 106.920123
    }
    
    if ('{{ $place }}' == 'Amsterdam, Netherlands') {
        mapCenter = { 
            lat: 52.3702,
            lng: 4.8952
        }
    }
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            scrollwheel: false,
            center: mapCenter,
        });
        setMarkers(map);
        var input = document.getElementById('searchplace');
        var autocomplete = new google.maps.places.Autocomplete(input, { types: ['(cities)'] });
    }

    initMap();

    function setMarkers(map) {
        $("#loader").addClass("active");
        loadData(1, '', '', '', '','');
        var star = "";

        // =============================================================================
        //  - Search by star of hotels
        // =============================================================================

        $(".star-filter").change(function (value) {
            star = $('.star-filter').dropdown('get value');
            $("#loader").addClass("active");
            if (valueArray.length == 0 && ratingArray.length == 0) {
                $("#loader").addClass("active");
                loadData(1, star, '', '', '', '');
            } else if(valueArray.length == 0 && ratingArray.length != 0) {
               $("#loader").addClass("active");
                loadData(1, star, '' , '' ,ratingArray[0], ratingArray[1]);
            } else if(valueArray.length != 0 && ratingArray.length == 0){
                 $("#loader").addClass("active");
                loadData(1, star, valueArray[0], valueArray[1], '', '');
            } else if(valueArray.length != 0 && ratingArray.length != 0){
                 $("#loader").addClass("active");
                loadData(1, star, valueArray[0], valueArray[1], ratingArray[0], ratingArray[1]);
            }
            $('#pagination').bootpag({ page: 1 });
        })

        // =============================================================================
        //  - Search by price range 
        // =============================================================================

        var maxprice = '{{$maxprice}}';
        var maxpricebydollar = numeral(maxprice/'{{$rate}}').format('0');
        var minprice = '{{$minprice}}';
        var minpricebydollar = numeral(minprice/'{{$rate}}').format('0');
        var snapSlider = document.getElementById('slider-snap');
        @if (App::isLocale('mn')) 
            noUiSlider.create(snapSlider, {
            start: [parseInt(minprice), parseInt(maxprice)],
            step: 10,
            range: {
                'min': [parseInt(minprice)],
                'max': [parseInt(maxprice)]
                }
            });
        @elseif (App::isLocale('en')) 
            noUiSlider.create(snapSlider, {
            start: [parseInt(minpricebydollar), parseInt(maxpricebydollar)],
            step: 1,
            range: {
                'min': [parseInt(minpricebydollar)],
                'max': [parseInt(maxpricebydollar)]
                }
            });
        @endif

        snapSlider.noUiSlider.on('end', function (values, handle) {
            valueArray[0] = parseInt(values[0]);
            valueArray[1] = parseInt(values[1]);
            if(ratingArray.length == 0){
                $("#loader").addClass("active");
                loadData(1, star, parseInt(values[0]), parseInt(values[1]), '', '');
            }else{
                $("#loader").addClass("active");
                loadData(1, star, parseInt(values[0]), parseInt(values[1]), ratingArray[0], ratingArray[1]);
            }
            $('#pagination').bootpag({ page: 1 });
        });

        snapSlider.noUiSlider.on('update', function (values, handle) {
             @if (App::isLocale('mn')) 
                $('#minVal').html('₮ ' + numeral(parseInt(values[0])).format('0,0'));
                $('#maxVal').html('₮ ' + numeral(parseInt(values[1])).format('0,0'));
            @elseif (App::isLocale('en')) 
                $('#minVal').html('$ ' + numeral(parseInt(values[0])).format('0,0'));
                $('#maxVal').html('$ ' + numeral(parseInt(values[1])).format('0,0'));
            @endif
            
        });

      $('#user-rating')
        .popup({
            inline     : true,
            hoverable  : true,
            position   : 'bottom center',
            delay: {
            show: 300,
            hide: 800
            }
        })
        ;

        var snapSlider1 = document.getElementById('user-rating-slider');
        noUiSlider.create(snapSlider1, {
            start: [0, 10],
            step: 0.1,
            range: {
                'min': [0],
                'max': 10
            }
        });

        snapSlider1.noUiSlider.on('end', function (values, handle) {
            ratingArray[0] = parseFloat(values[0]).toFixed(1);
            ratingArray[1] = parseFloat(values[1]).toFixed(1);
             if (valueArray.length == 0) {
                $("#loader").addClass("active");
                loadData(1, star, '', '', ratingArray[0], ratingArray[1]); 
            } else {
                $("#loader").addClass("active");
                loadData(1, star, valueArray[0], valueArray[1], ratingArray[0], ratingArray[1]);
            }
            $('#pagination').bootpag({ page: 1 });
        });

        snapSlider1.noUiSlider.on('update', function (values, handle) {
            $('#user-rating-value').html('{{ __("messages.User Rating")}}: ' + parseFloat(values[0]).toFixed(1) + "-" + parseFloat(values[1]).toFixed(1));
        });

        // =============================================================================
        //  - Pagination function
        // =============================================================================

        $('#pagination').hide();
        $('#pagination').bootpag({
            total: Math.ceil('{{$count}}'),
            activeClass: 'active',
            page: 1,
            maxVisible: 5,
            wrapClass: 'simple-pagination'
        }).on("page", function (event, num) {
            $('html,body').animate({
                scrollTop: $(".search-result").offset().top + 50
            }, 300);
            $("#loader").addClass("active");
             if (valueArray.length == 0 && ratingArray.length == 0) {
                $("#loader").addClass("active");
                loadData(num, star, '', '', '', '');
            } else if(valueArray.length == 0 && ratingArray.length != 0) {
               $("#loader").addClass("active");
                loadData(num, star, '' , '' ,ratingArray[0], ratingArray[1]);
            } else if(valueArray.length != 0 && ratingArray.length == 0){
                 $("#loader").addClass("active");
                loadData(num, star, valueArray[0], valueArray[1], '', '');
            } else if(valueArray.length != 0 && ratingArray.length != 0){
                 $("#loader").addClass("active");
                loadData(num, star, valueArray[0], valueArray[1], ratingArray[0], ratingArray[1]);
            }
        });

        // =============================================================================
        //  - Show result of search by card
        //  - Show the results on google map
        // =============================================================================        
        
        function loadData(page, star, first, last, rating1, rating2) {
            for (i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
            }
            markers = [];
            var hqmarker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: 52.3778973,
                    lng: 4.9120969
                },
                icon: "{{asset('/img/mapicon/hq.png')}}",
                zIndex:100
            });
            markers.push(hqmarker);
            $.get('checkhotels?page=' + page + '&filterprice1=' + first + '&filterprice2=' + last + '&filterstar=' + star + '&rating1=' + rating1 + '&rating2=' + rating2)
                .success(function (data) {
                allHotels = data.allhotels;
                $('.searchResult').empty();
                $('#pagination').bootpag({ total: Math.ceil(data.result / 10) });
                var textToInsert = '';
                var resultlength = Object.keys(data.data).length;
                $("#resultLength").text(data.result);
                if (resultlength == 0) {
                    $("#noresult").css("display", "");
                    $("#loader").removeClass("active");
                    $("#pagination").css("display", "none");
                    $("#errorresult").css("display", "none");
                } else {
                    $("#noresult").css("display", "none");
                    $("#pagination").css("display", "");
                    $("#loader").removeClass("active");
                    $("#errorresult").css("display", "none");
                }
                for (var key in data.data) {
                    if (data.data.hasOwnProperty(key)) {
                    var rating = 0;
                    if (data.data[key].rating != 0) {
                        finalrating = "<div class='review'>\
                                <span class='ui green label'>" + parseFloat(data.data[key].rating).toFixed(1) + "</span>\
                            </div>";
                    }
                    else {
                        finalrating = "";
                    }

                    var star = "";

                    var times = data.data[key].star;
                    for(var i=0; i < times; i++){
                            star += "<i class='icon yellow star'></i>";
                    }
                    var lowest = data.data[key].rooms[0].price;
                    if (data.data[key].rooms[0].price_op) {
                        lowest = data.data[key].rooms[0].price_op;
                    }
                    var saledprice;
                    for(var i=0; i < data.data[key].rooms.length; i++){
                        tmp = data.data[key].rooms[i].price;
                        if (data.data[key].rooms[i].price_op) {
                            tmp = data.data[key].rooms[i].price_op;
                        }
                        if (data.data[key].rooms[i].sales.length > 0) {
                            tmp = data.data[key].rooms[i].sales[0].price;
                            if (data.data[key].rooms[i].sales[0].price_op) {
                                tmp = data.data[key].rooms[i].sales[0].price_op;
                            }
                        }
                        if (parseFloat(tmp) < parseFloat(lowest)) {
                            lowest = tmp;
                        }
                    }
                    var url = '{{ route("search.hotel", "id") }}';
                    url = url.replace('id', data.data[key].id);
                    var rating = '{{ $rate }}';
                    

                    var star_class = '';
                    if (data.data[key].star == 1) {
                        star_class = 'onestar';
                    } else if (data.data[key].star == 2) {
                        star_class = 'twostar';
                    } else if (data.data[key].star == 3) {
                        star_class = 'threestar';
                    } else if (data.data[key].star == 4) {
                        star_class = 'fourstar';
                    } else if (data.data[key].star == 5) {
                        star_class = 'fivestar';
                    }
                    @if (App::isLocale('en')) {
                    textToInsert = "<div class='list-item box' id='"+ data.data[key].id +"' data-id='"+ data.data[key].id +"'> \
                                        <div class='img left'> \
                                            <a href='" + url + "' style='color:white' target='_blank'>\
                                            <div class='box-border'></div>\
                                            <img class='ui fluid image' style='max-width:100%;max-height:100%' src='" + data.data[key].cover_photo + "'/> \
                                            </a>\
                                        </div>\
                                        " + finalrating + "\
                                        <div class='price'>\
                                            <h4>$" + numeral(lowest/rating).format('0,0') + "</h4>\
                                        </div>\
                                        <div class='room-name' >\
                                            <a href='" + url + "' style='color:white' target='_blank'>\
                                                <h5>" + data.data[key].name_en + "</h5>\
                                            </a>\
                                        </div>\
                                        <p class='theme'>\
                                            <span class='" + star_class + "'>\
                                                " + star + "\
                                            </span>\
                                        </p>\
                                        <div class='room-button'>\
                                            <a href='" + url + "' target='_blank' class='ui blue button'>{{ __('messages.Book now')}}</a>\
                                        </div>\
                                    </div>";
                    }
                    @elseif(App::isLocale('mn')) {
                    textToInsert = "<div class='list-item box' id='"+ data.data[key].id +"' data-id='"+ data.data[key].id +"'> \
                                        <div class='img left'> \
                                            <a href='" + url + "' style='color:white' target='_blank'>\
                                                <div class='box-border'></div>\
                                            <img class='ui fluid image' style='max-width:100%;max-height:100%' src='" + data.data[key].cover_photo + "'/> \
                                            </a>\
                                        </div>\
                                        " + finalrating + "\
                                        <div class='price'>\
                                            <h4>" + numeral(lowest).format('0,0') + "₮</h4>\
                                        </div>\
                                        <div class='room-name' >\
                                            <a href='" + url + "' style='color:white' target='_blank'>\
                                                <h5>" + data.data[key].name + "</h5>\
                                            </a>\
                                        </div>\
                                        <p class='theme'>\
                                            <span class='" + star_class + "'>\
                                                " + star + "\
                                            </span>\
                                        </p>\
                                        <div class='room-button'>\
                                            <a href='" + url + "' target='_blank' class='ui blue button'>{{ __('messages.Book now')}}</a>\
                                        </div>\
                                    </div>";
                    }
                    @endif
                    }
                    $('#searchResult').append(textToInsert);


                    @if (App::isLocale('en')) {
                    var contentString = "<div style='padding:0;width:100%;margin:0;overflow: hidden;'> \
                                            <img src='" + data.data[key].cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                            <div class='maptitle'>" + data.data[key].name_en + "</div>\
                                            <span class='mapstar'>" + star + "</span>\
                                            <div class='mapprice'>$" + numeral(lowest / rating).format('0,0') + "</div>\
                                        </div>";
                                                
                    var contentString1 = "<div style='padding:0;margin:0;overflow: hidden;'> \
                                            <img src='" + data.data[key].cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                            <div class='maptitle'>" + data.data[key].name_en + "</div>\
                                            <div class='mapprice'>$" + numeral(lowest / rating ).format('0,0') + "</div>\
                                            <span class='mapstar'>" + star + "</span>\
                                            <a href='" + url + "' target='_blank'>\<button class='ui button mapbutton' style='background-color:#2185D0;color:white'>{{ __('messages.Read More') }}</button></a>\
                                        </div>";
                    }
                    @elseif(App::isLocale('mn')) {
                    var contentString = "<div style='padding:0;width:100%;margin:0;overflow: hidden;'> \
                                            <img src='" + data.data[key].cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                            <div class='maptitle'>" + data.data[key].name + "</div>\
                                            <span class='mapstar'>" + star + "</span>\
                                            <div class='mapprice'>" + numeral(lowest).format('0,0') + "₮</div>\
                                        </div>";

                    var contentString1 = "<div style='padding:0;margin:0;overflow: hidden;'> \
                                            <img src='" + data.data[key].cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                            <div class='maptitle'>" + data.data[key].name + "</div>\
                                            <div class='mapprice'>" + numeral(lowest).format('0,0') + "₮</div>\
                                            <span class='mapstar'>" + star + "</span>\
                                            <a href='" + url + "' target='_blank'>\<button class='ui button mapbutton' style='background-color:#2185D0;color:white'>{{ __('messages.Read More') }}</button></a>\
                                        </div>";
                    }
                    @endif

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        maxWidth: 250,
                        zIndex: 10,
                    });
                    var infowindow1 = new google.maps.InfoWindow({
                        content: contentString1,
                        maxWidth: 250,
                        zIndex: 10,
                    });

                    var image = "{{asset('/img/mapicon/villa.png')}}";
                    var image2 = "{{asset('/img/mapicon2/villa.png')}}";
                    
                    var marker = new google.maps.Marker({
                        map: map,
                        draggable: false,
                        id: data.data[key].id,
                        animation: google.maps.Animation.DROP,
                        position: { lat: parseFloat(JSON.parse(data.data[key].location)[0]), lng: parseFloat(JSON.parse(data.data[key].location)[1]) },
                        icon: image,
                        optimized: false,
                        zIndex:100
                    });
                    markers.push(marker);

                    var clicked = false;
                    google.maps.event.addListener(marker, 'mouseover', (function (marker, contentString, infowindow) {
                        return function () {
                            if (!clicked) {
                                infowindow.open(map, marker);
                                marker.setIcon(image2);
                                $('#' + marker.id).find('.img.left').addClass('hover');
                            }
                        };
                    })(marker, contentString, infowindow));
                    google.maps.event.addListener(marker, 'mouseout', (function (marker, contentString, infowindow, infowindow1) {
                        return function () {
                            if (!clicked) {
                                infowindow.close();
                                infowindow1.close();
                                marker.setIcon(image);
                                $('#' + marker.id).find('.img.left').removeClass('hover');
                            }
                        };
                    })(marker, contentString, infowindow, infowindow1));

                    google.maps.event.addListener(infowindow1, 'closeclick', (function (marker) {
                        return function(){
                            clicked = false;
                            marker.setIcon(image);
                            $('#' + marker.id).find('.img.left').removeClass('hover');
                        }
                    })(marker));

                    google.maps.event.addListener(marker, 'click', (function (marker, contentString1, infowindow1, infowindow) {
                        return function () {
                            // clicked = true;
                            // infowindow.close();
                            // infowindow1.open(map, marker);
                            window.open("{{ url('search/hotel') }}/" + marker.id, "_blank");
                            marker.setIcon(image2);
                        };
                    })(marker, contentString1, infowindow1, infowindow));

                    $('.list-item').mouseover(function(){
                        for(var i = 0; i < markers.length; i++){
                        if($(this).data('id') == markers[i].id){
                                markers[i].setIcon(image2);
                                break;
                        }
                        }
                    }).mouseout(function(){
                        for(var i = 0; i < markers.length; i++){
                            if($(this).data('id') == markers[i].id){
                                markers[i].setIcon(image);
                                break;
                            }
                        }
                    })
                
                    $("#loader").removeClass("active");
                    $('.ui.dropdown').dropdown({
                        on: 'click'
                    });
                    }

                    var icon1 =  new google.maps.Circle({
                                    path: google.maps.SymbolPath.CIRCLE,
                                    fillColor : "#1972AA",
                                    strokeColor: "white",
                                    strokeWeight: 1,
                                    scale: 5,
                                    strokeOpacity: 1,
                                    fillOpacity: 1,
                                });

                    var icon2 =  new google.maps.Circle({
                                    path: google.maps.SymbolPath.CIRCLE,
                                    fillColor : "#FD8A00",
                                    strokeColor: "white",
                                    strokeWeight: 1,
                                    scale: 5,
                                    strokeOpacity: 1,
                                    fillOpacity: 1,
                                })

                    allHotels.map(function (el) {
                        var found = false;
                        markers.map(function (data) {
                            if(data.id == el.id){
                                found = true;
                            }
                        });
                        if(!found){
                            marker = new google.maps.Marker({
                                map: map,
                                draggable: false,
                                id: el.id,
                                animation: google.maps.Animation.DROP,
                                position: { lat: parseFloat(JSON.parse(el.location)[0]), lng: parseFloat(JSON.parse(el.location)[1]) },
                                icon: icon1,
                                optimized: false,
                                zIndex:80
                            });
                            var star = "";
                            var times = el.star;
                            for(var i=0; i < times; i++){
                                    star += "<i class='icon yellow star'></i>";
                            }
                            var lowest = el.rooms[0].price;
                            var saledprice;
                            for(var i=0; i < el.rooms.length; i++){
                                tmp = el.rooms[i].price;
                                if(el.rooms[i].sales.length > 0){
                                        tmp = el.rooms[i].sales[0].price;
                                }
                                if (parseFloat(tmp) < parseFloat(lowest)) {
                                    lowest = tmp;
                                }
                            }
                            var url = '{{ route("search.hotel", "id") }}';
                            url = url.replace('id', el.id);
                            var rating = '{{ $rate }}';
                            @if (App::isLocale('en')) {
                            var contentString = "<div setyle='padding:0;width:100%;margin:0;overflow: hidden;'> \
                                                    <img src='" + el.cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                                    <div class='maptitle'>" + el.name_en + "</div>\
                                                    <span class='mapstar'>" + star + "</span>\
                                                    <div class='mapprice'>$" + numeral(lowest / rating).format('0,0') + "</div>\
                                                </div>";
                                                        
                            var contentString1 = "<div style='padding:0;margin:0;overflow: hidden;'> \
                                                    <img src='" + el.cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                                    <div class='maptitle'>" + el.name_en + "</div>\
                                                    <div class='mapprice'>$" + numeral(lowest / rating ).format('0,0') + "</div>\
                                                    <span class='mapstar'>" + star + "</span>\
                                                    <a href='" + url + "' target='_blank'>\<button class='ui button mapbutton' style='background-color:#2185D0;color:white'>{{ __('messages.Read More') }}</button></a>\
                                                </div>";
                            }
                            @elseif(App::isLocale('mn')) {
                            var contentString = "<div style='padding:0;width:100%;margin:0;overflow: hidden;'> \
                                                    <img src='" + el.cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                                    <div class='maptitle'>" + el.name + "</div>\
                                                    <span class='mapstar'>" + star + "</span>\
                                                    <div class='mapprice'>" + numeral(lowest).format('0,0') + "₮</div>\
                                                </div>";

                            var contentString1 = "<div style='padding:0;margin:0;overflow: hidden;'> \
                                                    <img src='" + el.cover_photo + "' height='200px' style='filter:brightness(50%);width:100%;background-image: linear-gradient(180deg, rgba(0, 0, 0, .5) 0, transparent 25%, transparent 50%, rgba(0, 0, 0, .7));'>\
                                                    <div class='maptitle'>" + el.name + "</div>\
                                                    <div class='mapprice'>" + numeral(lowest).format('0,0') + "₮</div>\
                                                    <span class='mapstar'>" + star + "</span>\
                                                    <a href='" + url + "' target='_blank'>\<button class='ui button mapbutton' style='background-color:#2185D0;color:white'>{{ __('messages.Read More') }}</button></a>\
                                                </div>";
                            }
                            @endif

                            var infowindow = new google.maps.InfoWindow({
                                content: contentString,
                                maxWidth: 250,
                                zIndex: 10,
                            });
                            var infowindow1 = new google.maps.InfoWindow({
                                content: contentString1,
                                maxWidth: 250,
                                zIndex: 10,
                            });

                            var clicked = false;
                            google.maps.event.addListener(marker, 'mouseover', (function (marker, contentString, infowindow) {
                                return function () {
                                    if (!clicked) {
                                        infowindow.open(map, marker);
                                        marker.setIcon(icon2);
                                        $('#' + marker.id).find('.img.left').addClass('hover');
                                    }
                                };
                            })(marker, contentString, infowindow));
                            google.maps.event.addListener(marker, 'mouseout', (function (marker, contentString, infowindow, infowindow1) {
                                return function () {
                                    if (!clicked) {
                                        infowindow.close();
                                        infowindow1.close();
                                        marker.setIcon(icon1);
                                        $('#' + marker.id).find('.img.left').removeClass('hover');
                                    }
                                };
                            })(marker, contentString, infowindow, infowindow1));


                            google.maps.event.addListener(infowindow1, 'closeclick', (function (marker) {
                                return function(){
                                    clicked = false;
                                    marker.setIcon(icon1);
                                    $('#' + marker.id).find('.img.left').removeClass('hover');
                                }
                            })(marker));

                            google.maps.event.addListener(marker, 'click', (function (marker, contentString1, infowindow1, infowindow) {
                                return function () {
                                //     clicked = true;
                                //     infowindow.close();
                                //     infowindow1.open(map, marker);
                                    marker.setIcon(icon2);
		                            window.open("{{ url('search/hotel') }}/" + data.data[key].id, "_blank");
                                };
                            })(marker, contentString1, infowindow1, infowindow));
                            markers.push(marker);
                        }
                    })
                    })
                    .error(function(jqXHR, textStatus, errorThrown) { 
                        $("#loader").removeClass("active");
                        $('.searchResult').empty();
                        $("#noresult").css("display", "none");
                        $('#pagination').css('display','none');
                        $("#errorresult").css("display", "");
                        if (textStatus == 'timeout'){
                            $('#errorresult .header').html('The server is not responding');
                        }
                        if (textStatus == 'error'){
                            $('#errorresult .header').html(errorThrown);
                        }
                    });
    }

    // =============================================================================
    //  - Show price range slider 
    // =============================================================================        

    
    var maxprice = '{{$maxprice}}';
    jQuery.fn.jplist.settings = {
        pricesSlider: function ($slider, $prev, $next) {
            $slider.slider({
                min: 0,
                max: maxprice,
                range: true,
                values: [0, maxprice],
                slide: function (event, ui) {
                    $prev.text('₮' + ui.values[0]);
                    $next.text('₮' + ui.values[1]);
                    valueArray = ui.values;
                    valueArray.sort(function (a, b) { return a - b });
                    valueArray[0];
                    valueArray[valueArray.length - 1];
                },
            });
        },
        priesValues: function ($slider, $prev, $next) {
            $prev.text('₮' + $slider.slider('values', 0));
            $next.text('₮' + $slider.slider('values', 1));
        }

    };
    $('#demo').jplist({
        itemsBox: '.list',
        itemPath: '.list-item',
        panelPath: '.jplist-panel'
    });
    }

    // ============================================================================
    //  - Get all data of search 
    //  - Then pass the data to search function  
    // ============================================================================

    $("#searchButton").click(function () {
        $('#searchButton').addClass('loading');
        if (!people) {
            people = 2;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchPlace = $('#searchplace').val();
        $.get('search?roomnumber=' + roomNumber + '&peoplenumber=' + people + '&startdate=' + startDate + '&enddate=' + endDate + '&place=' + searchPlace)
        .success(function (data) {
            window.location = "{{URL::to('searchresult')}}";
        })
        .error(function(jqXHR, textStatus, errorThrown){
            if (textStatus == 'error'){
                    console.log(errorThrown);
            }
        });
    });

    $(document).on('click', '.favorite-btn', function(e) {
        var btn = $(this);
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "{{ url('favorite') }}",
            data: {
                'hotel_id': id,
                '_token': '{{ csrf_token() }}',
                },
            success: function(data) {
                if (data.favorited) {
                    btn.find('.icon').removeClass('empty');
                }
                else {
                    btn.find('.icon').addClass('empty');
                }
            },
            error: function(){
                
            }
        });
        e.preventDefault();
    });

</script>

@endpush
