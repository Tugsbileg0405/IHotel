@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	<form id="create-room-service-form" class="ui form segment" action="{{ url('hotel/room/service', $hotel->id) }}" method="POST">
		{{ csrf_field() }}
		<img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
		<h6 class="ui horizontal header divider ihotel-title">Өрөөний дэлгэрэнгүй мэдээлэл</h6>
		@foreach ($rooms->chunk(3) as $roomSet)
			<div class="three fields">
				@foreach ($roomSet as $room)
					<div class="required field">
						<label>{{ $room->name }}</label>
						<div class="ui right labeled input">
							<input type="text" name="room-size-{{ $room->id }}" value="{{ $room->size }}">
							<div class="ui basic label">m2</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
		@foreach ($categories as $category)
			<h6 class="ui horizontal header divider ihotel-title">{{ $category->name }}</h6>
			@foreach ($category->services->chunk(2) as $serviceSet)
				<div class="two fields">
					@foreach ($serviceSet as $service)
						<div class="field">
							<label>{{ $service->name }}</label>
							<select multiple="" name="service-{{ $service->id }}[]" class="ui dropdown">
								<option value="">Сонгох</option>
								@foreach ($rooms as $room)
									<option value="{{ $room->id }}"
										{{ $service->rooms->contains($room->id) ? 'selected' : '' }}>
							            {{ $room->name }}
						            </option>
								@endforeach
							</select>
						</div>
					@endforeach
				</div>
			@endforeach
		@endforeach
		<h6 class="ui horizontal header divider ihotel-title">Өрөөний танилцуулга</h6>
		@foreach ($rooms as $room)
			<div class="required field">
				<label>{{ $room->name }}</label>
				<textarea name="room-introduction-{{ $room->id }}" class="editor">{{ $room->introduction }}</textarea>
			</div>
		@endforeach
		<h6 class="ui horizontal header divider ihotel-title">Бусад мэдээлэл</h6>
		<div class="field">
			<textarea name="other_info" placeholder="Нэмэлт мэдээлэл" class="editor">{{ $hotel->other_info }}</textarea>
		</div>
		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="{{ url('hotel/room', $hotel->id) }}">Буцах</a>
			<div class="or"></div>
			<button class="ui primary button" type="submit">
				Дараах<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$('#create-room-service-form').form({
	    inline : true,
	    fields: {
			@foreach ($rooms as $room)
		        size{{ $room->id }}: {
		            identifier  : 'room-size-{{ $room->id }}',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Хэмжээ оруулна уу'
		                },
		                {
			                type   : 'integer[1..9999999999]',
		                    prompt : 'Хэмжээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[10]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        introduction{{ $room->id }}: {
		            identifier  : 'room-introduction-{{ $room->id }}',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Танилцуулга оруулна уу'
		                }
		            ]
		        },
	        @endforeach
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