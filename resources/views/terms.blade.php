@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">{{ __('messages.Terms of service') }}</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section">{{ __('messages.Home') }}</a>
					<span class="divider">/</span>
					<div class="active section">{{ __('messages.Terms of service') }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="sixteen wide column">
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
			</div>
		</div>
	</div>
</div>
@endsection