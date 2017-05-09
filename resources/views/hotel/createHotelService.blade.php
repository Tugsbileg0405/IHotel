@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	<form class="ui form segment" id="create-hotel-service-form" action="{{ url('hotel/service', $hotel->id) }}" method="POST">
		{{ csrf_field() }}
		<img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
		<h6 class="ui horizontal header divider ihotel-title">Буудлын мэдээлэл</h6>
		<div class="two fields">
			<div class="requried field">
				<label>Хүүхэд авчирч болох эсэх</label>
				<div class="inline fields">
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_child" value="1" class="hidden" {{ $hotel->is_child ? '' : 'checked' }} {{ $hotel->is_child == 1 ? 'checked' : '' }}>
							<label>Тийм</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_child" value="0" class="hidden" {{ $hotel->is_child == 0 ? 'checked' : '' }}>
							<label>Үгүй</label>
						</div>
					</div>
				</div>
			</div>
			<div class="required field">
				<label>Интернет байгаа эсэх</label>
				<div class="inline fields">
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_internet" value="0" class="hidden" {{ $hotel->is_internet ? '' : 'checked' }} {{ $hotel->is_internet == 0 ? 'checked' : '' }}>
							<label>Үгүй</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_internet" value="1" class="hidden" {{ $hotel->is_internet == 1 ? 'checked' : '' }}>
							<label>Тийм, үнэгүй</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_internet" value="2" class="hidden" {{ $hotel->is_internet == 2 ? 'checked' : '' }}>
							<label>Тийм, үнэтэй</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		@foreach ($categories->chunk(2) as $categorySet)
			<div class="two fields">
				@foreach ($categorySet as $category)
					<div class="field">
						<label>{{ $category->name }}</label>
						<select multiple="" name="services[]" class="ui dropdown">
							<option value="">Сонгох</option>
							@foreach ($category->services as $service)
								<option value="{{ $service->id }}"
									{{ $hotel->services->contains($service->id) ? 'selected' : '' }}>
									{{ $service->name }}
								</option>
							@endforeach
						</select>
					</div>
				@endforeach
			</div>
		@endforeach
		<div class="required field">
			<label>Танилцуулга</label>
			<textarea name="introduction">{{ $hotel->introduction }}</textarea>
		</div>
		<div class="field">
			<label>Бусад нэмэлт мэдээллүүд</label>
			<textarea name="other_service">{{ $hotel->other_service }}</textarea>
		</div>
		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="{{ url('hotel/update', $hotel->id) }}">Буцах</a>
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
	$('#create-hotel-service-form').form({
	    inline : true,
	    fields: {
	        introduction: {
	            identifier: 'introduction',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Танилцуулга оруулна уу'
	                },
	                {
	                    type   : 'minLength[5]',
	                    prompt : 'Танилцуулга оруулна уу'
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