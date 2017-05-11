@extends('layouts.app')

@section('title', '503')

@section('content')
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">503</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="{{ url('/') }}">{{__("messages.Home")}}</a>
					<span class="divider">/</span>
					<div class="active section">503</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div style="text-align: center;padding: 100px 0;">
	    	<h1 style="font-size: 4em">503</h1>
	    	<p>Service unavailable</p>
	    </div>
	</div>
</div>
@endsection