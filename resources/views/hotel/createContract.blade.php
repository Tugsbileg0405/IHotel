@extends('layouts.hotel')

@section('title', 'iHotel')

@section('content')
@include('hotel.sidebar')
<div class="twelve wide column">
	@foreach ($terms as $term)
		<div class="ui segment">
			@if (App::isLocale('en'))
				<h4 class="ui header">{{ $term->title_en }}</h4>
				<p>{{ $term->content_en }}</p>
			@elseif (App::isLocale('mn'))
				<h4 class="ui header">{{ $term->title }}</h4>
				<p>{{ $term->content }}</p>
			@endif
		</div>
	@endforeach
	@if ($latest)
		<div class="ui segment">
			<h4 class="ui header">{{ __('messages.Update') }}</h4>
			<p>{{ __('messages.This terms of service updated on', [ 'date' => date('Y/m/d', strtotime($latest->updated_at))]) }}</p>
		</div>
	@endif
	<form class="ui form" id="create-contract-form" action="{{ url('hotel/contract', $hotel->id) }}" method="POST">
		{{ csrf_field() }}
		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="{{ url('hotel/payment', $hotel->id) }}">Буцах</a>
			<div class="or"></div>
			<button class="ui primary button" type="submit">
				Зөвшөөрч байна<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$('#create-contract-form').submit(function() {
    	$(this).find('button').addClass('loading disabled');
	});
</script>
@endpush