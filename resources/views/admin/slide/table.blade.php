@extends('layouts.profile')

@section('title', 'Хамт олон')

@section('content')
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Нүүр хуудасны зураг</h4>
		<div class="ui divider"></div>
        <form>
			<div class="required field">
				<label>Англи хуудасны зураг</label>
				<div class="ui segment">
			  		<a class="upload-browse">
			  			<i class="image icon"></i>
			  		</a>
					<input type="file" name="photo_en" id="photo_en" style="display: none">
			  		<div class="upload-zone" id="photos-en">
                        @foreach ($slides as $slide)
                            @if ($slide->locale == 1)
                                <div class="upload-zone-item">
                                    <img class="ui rounded image" src="{{ asset($slide->photo) }}">
                                    <a class="upload-zone-button" data-id="{{ $slide->id }}">
                                        <i class="close icon"></i>
                                    </a>
                                </div>
                            @endif
                        @endforeach
		  			</div>
				</div>
			</div><br>
			<div class="required field">
				<label>Монгол хуудасны зураг</label>
				<div class="ui segment">
			  		<a class="upload-browse">
			  			<i class="image icon"></i>
			  		</a>
					<input type="file" name="photo_mn" id="photo_mn" style="display: none">
			  		<div class="upload-zone" id="photos-mn">
                        @foreach ($slides as $slide)
                            @if ($slide->locale == 2)
                                <div class="upload-zone-item">
                                    <img class="ui rounded image" src="{{ asset($slide->photo) }}">
                                    <a class="upload-zone-button" data-id="{{ $slide->id }}">
                                        <i class="close icon"></i>
                                    </a>
                                </div>
                            @endif
                        @endforeach
		  			</div>
				</div>
			</div>
        </form>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.upload-browse').click(function() {
			$(this).siblings('input[type=file]').click();
		});
		var photos_en = $('#photos-en');
		var photos_mn = $('#photos-mn');
		$('#photo_en').change(function(){
            var formData = new FormData();
            formData.append('file', $('#photo_en')[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('locale', 1);
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '{{ url("profile/slide/upload") }}',	
	           	data: formData,
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
	            $(this).val('');
				$(segment).removeClass('loading disabled');
				$(data).appendTo(photos_en).transition('scale in');
	   		}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$('#photo_mn').change(function(){
            var formData = new FormData();
            formData.append('file', $('#photo_mn')[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('locale', 2);
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '{{ url("profile/slide/upload") }}',	
	           	data: formData,
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
	            $(this).val('');
				$(segment).removeClass('loading disabled');
				$(data).appendTo(photos_mn).transition('scale in');
	   		}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$(document).on('click', '.upload-zone-button', function() {
            var id = $(this).data('id');
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '{{ url("profile/slide/destroy") }}/' + id,
	           	data: formData,
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
                $(this).closest('.upload-zone-item').remove();
				$(segment).removeClass('loading disabled');
	   		}).fail(function() {
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
	});
</script>
@endpush