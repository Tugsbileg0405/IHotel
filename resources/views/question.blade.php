@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">{{__("messages.Frequently asked questions")}}</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{ url('/') }}">{{__("messages.Home")}}</a>
					<span class="divider">/</span>
					<div class="active section">{{__("messages.Frequently asked questions")}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui styled accordion fluid segments">
			@foreach ($questions as $question)
				<div class="title">
					<i class="dropdown icon"></i>
					@if (App::isLocale('en'))
						{{ $question->question_en }}
					@elseif (App::isLocale('mn'))
						{{ $question->question }}
					@endif
				</div>
				<div class="content">
					@if (App::isLocale('en'))
						<p>{{ $question->answer_en }}</p>
					@elseif (App::isLocale('mn'))
						<p>{{ $question->answer }}</p>
					@endif
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection