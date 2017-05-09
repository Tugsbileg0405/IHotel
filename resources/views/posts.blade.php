@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">{{__("messages.Travel Inspiration")}}</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{ url('/') }}">{{__("messages.Home")}}</a>
					<span class="divider">/</span>
					<div class="active section">{{__("messages.Travel Inspiration")}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container ">
		<div class="ui stackable column grid">
			<div class="eleven wide column">
				@if ($posts->count() > 0)
					@foreach ($posts as $post)
						<div class="ui segment">
							<div class="content">
								<h4 class="ui header blog-header">
									<a href="{{ url('post', $post->id) }}">{{ $post->title }}</a>
								</h4>
								<div class="ui divided horizontal list">
									<div class="item">
										<img class="ui avatar image" src="{{ asset($post->user->avatar) }}">
										<div class="content">
											<a href="{{ url('posts/user', $post->user->id) }}" class="header">{{ $post->user->name }}</a>
										</div>
									</div>
									<div class="item">
										<a class="header" href="{{ url('category', $post->category->id) }}">
											<i class="icon folder"></i>
											@if (App::isLocale('en'))
												{{ $post->category->name_en }}
											@elseif (App::isLocale('mn'))
												{{ $post->category->name }}
											@endif
										</a>
									</div>
									<div class="item">
										<div class="blog-date">
											<i class="icon calendar"></i>{{ date('Y-m-d', strtotime($post->created_at)) }}
										</div>
									</div>
									<div class="item">
										<div class="blog-date">
											<i class="icon eye"></i>{{ $post->views }}
										</div>
									</div>
								</div>
								<div class="ui fluid image">
									<div class="blog-img">
										<img src="{{ asset(unserialize($post->photos)[0]) }}">
									</div>
								</div>
								<div class="description">
									{{ $post->excerpt }}
								</div>
								<div class="ui grid">
									<div class="ten wide column">
										<div class="social-link"></div>
									</div>
									<div class="six wide column">
										<a class="ui right floated primary button" href="{{ url('post', $post->id) }}">{{__("messages.Read More")}}</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					{{ $posts->links() }}
				@else
					<div class="ui segment">{{__("messages.Not found")}}</div>
				@endif
			</div>
			@include('partials.sidebar')
		</div>
	</div>
</div>
@endsection