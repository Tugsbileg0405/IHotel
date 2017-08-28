@extends('layouts.post')

@section('metatag')
<!-- Facebook Metadata /-->
<meta property="og:url" content="https://www.ihotel.mn" />
<meta property="og:title" content="iHotel.mn | {{ $post->title }}" />
<meta property="og:image" content="{{ asset(unserialize($post->photos)[0])}}" />
<meta property="og:description" content="{{ $post->excerpt }}" />

<!-- Google Metadata /-->
<meta itemprop="name" content="iHotel.mn | {{ $post->title }}">
<meta itemprop="description" content="{{ $post->excerpt }}"/>
<meta itemprop="image" content="{{ asset(unserialize($post->photos)[0])}}" />

<!-- Twitter Metadata /-->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@ihotelmn" />
<meta name="twitter:title" content="iHotel.mn | {{ $post->title }}">
<meta name="twitter:description" content="{{ $post->excerpt }}"/>
<meta name="twitter:image" content="{{ asset(unserialize($post->photos)[0])}}" />
@endsection

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">
					@if (App::isLocale('en'))
						{{ $post->category->name_en }}
					@elseif (App::isLocale('mn'))
						{{ $post->category->name }}
					@endif
				</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{ url('/') }}">{{__("messages.Home")}}</a>
					<span class="divider">/</span>
					<a class="section" href="{{ url('posts') }}">{{__("messages.Travel Inspiration")}}</a>
					<span class="divider">/</span>
					<a class="section" href="{{ url('category', $post->category->id) }}">
						@if (App::isLocale('en'))
							{{ $post->category->name_en }}
						@elseif (App::isLocale('mn'))
							{{ $post->category->name }}
						@endif
					</a>
					<span class="divider">/</span>
					<div class="active section">{{ $post->title }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="eleven wide column">
				<div class="ui segment">
					<div class="content">
						<h4 class="ui right floated header">
							<a href="{{ url('category', $post->category->id) }}">
								<i class="angle left icon"></i>{{__("messages.Back")}}
							</a>
						</h4>
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
						<section class="slider">
							<div id="slider" class="flexslider">
								<ul class="slides">
									@if ($post->photos)		
										@foreach (unserialize($post->photos) as $photo)
											<li>
												<img src="{{ asset($photo) }}">
											</li>
										@endforeach
									@endif
								</ul>
							</div>
							<div id="carousel" class="flexslider">
								<ul class="slides">
									@if ($post->photos)		
										@foreach (unserialize($post->photos) as $photo)
											<li>
												<img src="{{ asset($photo) }}">
											</li>
										@endforeach
									@endif
								</ul>
							</div>
						</section>
						{!! $post->content !!}
						<div class="ui hidden divider"></div>
						<div id="social-link"></div>
					</div>
				</div>
				<div class="ui stackable grid">
					<div class="sixteen wide column">
						<div class="ui comments">
							<h3 class="ui dividing header">Сэтгэгдэл</h3>
							<div id="comments"> 
								@foreach ($comments as $comment)
									<div class="comment">
										<a class="avatar">
											<img src="{{ asset($comment->user->avatar) }}">
										</a>
										<div class="content">
											<a class="author">{{ $comment->user->name }}</a>
											<div class="metadata">
												<span class="date">{{ date('Y-m-d h:i:sa', strtotime($comment->created_at)) }}</span>
											</div>
											<div class="text">{{ $comment->content }}</div>
										</div>
									</div>
								@endforeach
							</div>
							@if (Auth::check())
								<form id="create-comment-form" class="ui reply form" action="{{ url('comment', $post->id) }}" method="POST">
									{{ csrf_field() }}
									<div class="field">
										<textarea name="content"></textarea>
									</div>
									<button class="ui blue labeled submit icon button" type="submit">
										<i class="icon edit"></i> Сэтгэгдэл илгээх
									</button>
								</form>
							@else
								<div class="ui message">
									<p>Та сэтгэгдэл бичхийн тулд нэвтрэх шаардлагатай. <a href="{{ url('login') }}">Энд</a> дарж нэвтэрнэ үү.</p>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			@include('partials.sidebar')
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="{{asset('js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
<script type="text/javascript">
	$('#create-comment-form').submit(function(e) {
		$(this).find('button').addClass('loading disabled');
		e.preventDefault();
		$.ajax({
			method: $(this).attr('method'),
			url: $(this).attr('action'),
			data: $(this).serialize(),
			context: this,
		}).done(function(data) {
			$('#comments').prepend(data);
			$(this).find('button').removeClass('loading disabled');
			$(this).trigger('reset');
			$(window).scrollTop($('#comments').offset().top - 100);
		}).fail(function() {
			$(this).find('button').removeClass('loading disabled');
		});
	});
	$(window).load(function(){
		$('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 100,
			itemMargin: 5,
			asNavFor: '#slider'
		});
		$('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel",
			start: function(slider){
				$('body').removeClass('loading');
			}
		});
	});
	$("#social-link").jsSocials({
	    url: "{{ url('post', $post->id) }}",
	    text: "{{ $post->title }}",
	    showLabel: true,
	    showCount: true,
	    shareIn: "popup",
	    shares: [
		    {
				share: "facebook",
				label: "Share",
				logo: "facebook f icon",
		    },
		    {
				share: "twitter",
				label: "Tweet",
				logo: "twitter icon",
		    },
		    {
				share: "googleplus",
				label: "+1",
				logo: "google plus icon",
		    }
		]
	});
</script>
@endpush