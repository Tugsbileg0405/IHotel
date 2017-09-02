@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	<form class="ui form segment" id="create-hotel-form" action="{{ url('hotel/update', $hotel->id) }}" method="POST">
		{{ csrf_field() }}
		<img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
		<h6 class="ui horizontal header divider ihotel-title">Үндсэн мэдээлэл</h6>
		<div class="required field">
			<label>Буудлын нэр</label>
			<input type="text" name="name" value="{{ $hotel->name }}">
		</div>
		<div class="required field">
			<label>Зочид буудын төрөл</label>
			<select class="ui fluid dropdown" name="category">
			<option value="">Сонгох</option>
				@foreach ($categories as $category)
					<option value="{{ $category->id }}"
						{{ $hotel->category_id == $category->id ? 'selected' : '' }}>
						{{ $category->name }}
					</option>
				@endforeach
			</select>
		</div>
		<div class="two fields">
			<div class="required field">
				<label>Одны зэрэглэл</label>
				<select name="star" class="ui fluid dropdown">
					<option value="">Сонгох</option>
					@for ($i=1; $i<=5; $i++)
						<option value="{{ $i }}"
							{{ $hotel->star == $i ? 'selected' : '' }}>
							{{ $i }} од
						</option>
					@endfor
				</select>
			</div>
			<div class="required field">
				<label>Өрөөний тоо</label>
				<input type="number" name="room_number" min="1" value="{{ $hotel->room_number }}">
			</div>
		</div>
		<div class="field">
			<label>Цахим хуудас</label>
			<div class="ui labeled input">
				<div class="ui label">http://</div>
				<input type="text" name="website" placeholder="mysite.com" value="{{ $hotel->website }}">
			</div>
		</div>
		<h6 class="ui horizontal header divider ihotel-title">
		Холбоо барих
		</h6>
		<div class="two fields">
			<div class="required field">
				<label>Холбоо барих ажилтны нэр</label>
				<input type="text" name="contact" value="{{ $hotel->contact }}">
			</div>
			<div class="required field">
				<label>Утас</label>
				<input type="text" name="phone_number" value="{{ $hotel->phone_number }}">
			</div>
		</div>
		<div class="required field">
			<label>И-мэйл</label>
			<input type="text" name="email" value="{{ $hotel->email }}">
		</div>
		<div class="required field">
			<label>Хаяг</label>
			<textarea name="address">{{ $hotel->address }}</textarea>
		</div>
		<div class="required field">
			<label>Байршил</label>
			<div id="map" style="height:300px"></div>
			<input type="hidden" value="{{ json_decode($hotel->location)[0] }}" name="lat" id="lat">
			<input type="hidden" value="{{ json_decode($hotel->location)[1] }}" name="lon" id="lon">
		</div>
		<div class="ui right floated buttons">
			<button class="ui primary button" type="submit">
				Дараах<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDssMBUJqsqfD7XE5DKCbk6jK9R1C81MH0&sensor=false&libraries=places"></script>
<script type="text/javascript">
	function initMap() {
	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 13,
	        center: {
	        	lat: {{ json_decode($hotel->location)[0] }}, 
	        	lng: {{ json_decode($hotel->location)[1] }}
	        },
	    });
		marker = new google.maps.Marker({
			position: {
				lat: {{ json_decode($hotel->location)[0] }}, 
				lng: {{ json_decode($hotel->location)[1] }}
			},
			map: map        
		});
		google.maps.event.addListener(map, "click", function (e) {
	    	$('#create-hotel-form').find('button').addClass('disabled');
			var lat = e.latLng.lat();
			var lon = e.latLng.lng();
			marker.setPosition(new google.maps.LatLng(lat, lon));
			$('#lat').val(lat);
			$('#lon').val(lon);
		});
	}
	initMap();
	$('#create-hotel-form').form({
	    inline : true,
	    fields: {
	        name: {
	            identifier  : 'name',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Нэр оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        category: {
	            identifier: 'category',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Төрөл сонгоно уу'
	                }
	            ]
	        },
	        star: {
	            identifier: 'star',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Одны зэрэглэл сонгоно уу'
	                }
	            ]
	        },
	        room_number: {
	            identifier: 'room_number',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
	                    type   : 'integer',
	                    prompt : 'Өрөөний тоо оруулна уу'
	                },
	                {
	                    type   : 'maxLength[6]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        contact: {
	            identifier  : 'contact',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Холбоо барих ажилтны нэр оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        phone_number: {
	            identifier  : 'phone_number',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Утасны дугаар оруулна уу'
	                },
	                {
	                    type   : 'minLength[3]',
	                    prompt : 'Утасны дугаар оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        website: {
	            identifier  : 'website',
	            rules: [
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        email: {
	            identifier  : 'email',
	            rules: [
	                {
	                    type   : 'email',
	                    prompt : 'И-мэйл хаяг оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        address: {
	            identifier  : 'address',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Хаяг оруулна уу'
	                },
	                {
	                    type   : 'minLength[6]',
	                    prompt : 'Хаяг оруулна уу'
	                }
	            ]
	        },
	        location: {
	            identifier  : 'location',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : 'Хаяг оруулна уу'
	                },
	                {
	                    type   : 'minLength[6]',
	                    prompt : 'Хаяг оруулна уу'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
	    	$(this).find('button').addClass('loading disabled');
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