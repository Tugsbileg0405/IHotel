@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	<div class="ui segment">
		<form id="create-room-photo-form" class="ui form" action="{{ url('hotel/room/photo', $hotel->id) }}" method="POST">
			{{ csrf_field() }}
			@foreach ($rooms as $room)
				<div class="required field">
					<label>{{ $room->name }} зураг</label>
					<div class="ui segment">
				  		<a class="upload-browse">
				  			<i class="plus icon"></i>
				  		</a>
						<input type="file" name="photo-{{ $room->id }}" data-id="{{ $room->id }}" style="display: none">
				  		<div class="upload-zone">
				  			@if ($room->photos)
					  			@if (count(unserialize($room->photos)) > 0)
					  				@foreach (unserialize($room->photos) as $photo)
										<div class="upload-zone-item">
											<img class="ui rounded image" src="{{ asset($photo) }}">
											<input type="text" name="photos-{{ $room->id }}[]" value="{{ $photo }}" style="display: none;">
											<a class="upload-zone-button">
												<i class="close icon"></i>
											</a>
										</div>
									@endforeach
					  			@endif
					  		@endif
				  		</div>
					</div>
				</div>
			@endforeach
			<div class="ui right floated buttons">
				<a class="ui ihotel-back button" href="{{ url('hotel/room/service', $hotel->id) }}">Буцах</a>
				<div class="or"></div>
				<button class="ui primary button" type="submit">
					Дараах<i class="right chevron icon"></i>
				</button>
			</div><br><br>
		</form>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#create-room-photo-form').form({
		    onSuccess: function() {
		    	$(this).find('button').addClass('loading disabled');
		    }
		});
		$('.upload-browse').click(function() {
			$(this).siblings('input[type=file]').click();
		});
		function isEmpty( el ){
			return !$.trim(el.html())
		}
		var empty = false;
		$('.upload-zone').each(function() {
			if(isEmpty($(this))) {
				empty = true;
			}
		});
		if (empty) {
			$('#create-room-photo-form').find('button').addClass('disabled');
		} else {
			$('#create-room-photo-form').find('button').removeClass('disabled');
		}
		$('input[type=file]').change(function(){
			var segment = $(this).closest('.segment');
			var container = $(this).siblings('.upload-zone');
			segment.addClass('loading disabled');
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: '{{ url("hotel/room/upload") }}' + '/' + id,	
	           	data: new FormData($(this).closest('form')[0]),
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
		            $(this).val('');
					$(segment).removeClass('loading disabled');
					$(data).appendTo(container).transition('scale in');
					var empty = false;
					$('.upload-zone').each(function() {
						if(isEmpty($(this))) {
							empty = true;
						}
					});
					if (empty) {
						$('#create-room-photo-form').find('button').addClass('disabled');
					} else {
						$('#create-room-photo-form').find('button').removeClass('disabled');
					}
			}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$(document).on('click', '.upload-zone-button', function() {
	   		$(this).closest('.upload-zone-item').remove();
			var empty = false;
			$('.upload-zone').each(function() {
				if(isEmpty($(this))) {
					empty = true;
				}
			});
			if (empty) {
				$('#create-room-photo-form').find('button').addClass('disabled');
			} else {
				$('#create-room-photo-form').find('button').removeClass('disabled');
			}
		});
	});
</script>
@endpush