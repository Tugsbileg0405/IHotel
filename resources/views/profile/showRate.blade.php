@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
	@if ($hotels->count() > 0)
		@foreach ($hotels as $hotel)
			<div class="ui segment">
				<h4 class="ui header">
					@if (App::isLocale('en'))
						@if ($hotel->name_en)
							{{ $hotel->name_en }}
						@else
							{{ $hotel->name}}
						@endif
					@elseif (App::isLocale('mn'))
						{{ $hotel->name }}
					@endif
				</h4>
				<div class="ui middle horizontal divided list">
					<div class="item">
						<div class="content">
							<div class="ui label">
								<i class="icon calendar"></i>{{ date('Y-m-d', strtotime($hotel->created_at)) }}
							</div>
							<div class="ui label">
								<i class="star yellow icon"></i> {{ __('messages.Rating') }} - {{ $hotel->rates->count() }}
							</div>
						</div>
					</div>
				</div>
				<a class="ui primary right floated button" href="{{ url('profile/rate/create', $hotel->id) }}">{{ __('messages.Read More') }}</a>
			</div>
		@endforeach
		{{ $hotels->links() }}
	@else
		<div class="ui segment">
			<p>Буудал олдсонгүй</p>
		</div>
	@endif
</div>
@endsection