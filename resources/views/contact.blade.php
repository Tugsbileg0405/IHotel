@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">{{__("messages.Contact")}}</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{ url('/') }}">{{__("messages.Home")}}</a>
					<span class="divider">/</span>
					<div class="active section">{{__("messages.Contact")}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="ten wide column">
				@if (App::isLocale('mn'))
					<h2 class="ui sub header">Хаяг</h2>
					<span>{{ $options[2]->value }}</span>
				@elseif (App::isLocale('en'))
					<h2 class="ui sub header">Address</h2>
					<span>{{ $options[2]->value_en }}</span>
				@endif
				@if (App::isLocale('mn'))
					<h2 class="ui sub header">Утас</h2>
					<span>{{ $options[3]->value }}</span>
				@elseif (App::isLocale('en'))
					<h2 class="ui sub header">Phone number</h2>
					<span>{{ $options[3]->value_en }}</span>
				@endif
				@if (App::isLocale('mn'))
					<h2 class="ui sub header">Цахим шуудан</h2>
					<span>{{ $options[4]->value }}</span>
				@elseif (App::isLocale('en'))
					<h2 class="ui sub header">E-mail address</h2>
					<span>{{ $options[4]->value_en }}</span>
				@endif
			</div>
			<div class="six wide column" >
				<form class="ui form segment" id="contact-form">
					{{ csrf_field() }}
				 	<h6 class="ui horizontal header center aligned">
						<i class="big mail outline icon"></i>
					</h6>
					<h6 class="ui horizontal header divider">{{__("messages.Contact Us")}}</h6>
					<div class="required field">
						<label>{{__("messages.Email")}}</label>
						<input type="text" name="email">
					</div>
					<div class="required field">
						<label>{{__("messages.Name")}}</label>
						<input type="text" name="name">
					</div>
					  <div class="required field">
					    <label>{{__("messages.Message")}}</label>
					    <textarea rows="5" name="content"></textarea>
					  </div>
					{!! Recaptcha::render() !!}<br>
					<button type="submit" class="ui primary fluid submit button">{{__("messages.Send")}}</button>
				</form>
				<div id="message"></div>
			</div>
		</div>
	</div>
</div>
<div class="ui fluid container">
	<div class="page-title">
		<div class="sixteen wide center aligned column">
			@if (App::isLocale('mn'))
				<h4>Байршил</h4>
			@elseif (App::isLocale('en'))
				<h4>Location</h4>
			@endif
		</div>
	</div>
	<div class="sixteen wide column">
		<div id="map" style="height:500px"></div>
	</div>
</div>
<div class="ui basic modal" id="success-message">
	<div class="ui icon header">
		<i class="green check icon"></i>
        {{ __('messages.Successfully sent') }}
	</div>
</div>
<div class="ui basic modal" id="error-message">
	<div class="ui icon header">
		<i class="red close icon"></i>
        {{ __('messages.Error occured') }}
	</div>
</div>
@endsection

@push('script')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDssMBUJqsqfD7XE5DKCbk6jK9R1C81MH0&sensor=false&libraries=places&callback=initMap">
</script>
<script type="text/javascript">
	function initMap() {
	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 13,
	        center: { lat: parseFloat('{{ json_decode($options[5]->value)[0] }}'), lng: parseFloat('{{ json_decode($options[5]->value)[1] }}') },
	    });

		marker = new google.maps.Marker({
	             position: { lat: parseFloat('{{ json_decode($options[5]->value)[0] }}'), lng: parseFloat('{{ json_decode($options[5]->value)[1] }}') },
	             map: map                    
		})

		google.maps.event.addListener(map, "click", function (e) {
			var lat = e.latLng.lat();
			var lon = e.latLng.lng();
			marker.setPosition(new google.maps.LatLng(lat, lon));
			$('#lat').val(lat);
			$('#lon').val(lon);
		});
	}
	$("#contact-form").submit(function(e) {
	    e.preventDefault(); 
	}).form({
	    inline : true,
	    fields: {
	        name: {
	            identifier  : 'name',
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
	        email: {
	            identifier  : 'email',
	            rules: [
	                {
	                    type   : 'email',
                    	prompt : '{{ __("form.Please enter your email") }}'
	                },
                    {
                        type   : 'maxLength[191]',
                    	prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
	            ]
	        },
	        content: {
	            identifier  : 'content',
	            rules: [
	                {
	                    type   : 'empty',
	                    prompt : '{{ __("form.Please enter a message") }}'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
			$('#contact-form button').addClass('loading disabled');
		    $.ajax({
				type: "POST",
				url: "{{ url('feedback') }}",
	           	data: $("#contact-form").serialize(),
	           	success: function() {
	           		$('#contact-form').trigger("reset");
					$('#contact-form button').removeClass('loading');
                    $('#success-message').modal('show');
	       		},
				error: function(){
					$('#contact-form button').removeClass('loading disabled');
                    $('#error-message').modal('show');
				}
			});
	    }
	});
</script>
@endpush