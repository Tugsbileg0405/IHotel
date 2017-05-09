@extends('layouts.profile')

@section('title', 'iHotel')

@section('content')
<div class="eleven wide column">
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
						@for ($i=0;$i<$hotel->star;$i++)
							<i class="yellow star icon"></i>
						@endfor
						<div class="ui label">
							<i class="icon calendar"></i>{{ date('Y-m-d', strtotime($hotel->created_at)) }}
						</div>
					</div>
				</div>
			</div>
			<a class="ui primary right floated button" href="{{ url('admin/hotel', $hotel->id) }}">{{ __('messages.Read More')}}</a>
		</div>
	@endforeach
	{{ $hotels->links() }}
</div>
@endsection