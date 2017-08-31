@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header">{{ __('messages.Order cancelled') }}</h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section" href="{{ url('/') }}">{{ __('messages.Home') }}</a>
                    <span class="divider">/</span>
                    <div class="active section">{{ __('messages.Order cancelled') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="silver-back">
    <div class="main-page">
        <div class="ui fluid stackable container">
            <div class="ui column grid">
                <div class="sixteen wide column">
                    <div class="ui stackable container">
                        <div class="ui stackable grid">
                            <div class="ui sixteen column row">
                                <div class="four wide column"></div>
                                <div class="eight wide column">
                                    <div class="ui icon success message">
                                        <i class="check circle icon"></i>
                                        <div class="content">
                                            <div class="header">
                                            {{ __('messages.Your order is cancelled successfully') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui stackable grid">
                                        <div class="ui {{ Auth::check() ? 'three' : 'two' }} column row">
                                            <div class="column">
                                                <a class="ui fluid  primary icon button" href="{{ url('/') }}">
                                                    {{ __('messages.Go to home page') }}
                                                </a>
                                            </div>
                                            @if (Auth::check())
                                                <div class="column">
                                                    <a class="ui fluid  primary icon button" href="{{ url('/profile/orders') }}">
                                                        {{ __('messages.Go to order page') }}
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="column">
                                                <a class="ui fluid  primary icon button" href="{{ url('/searchresult') }}">
                                                    {{ __('messages.Go to search page') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="four wide column"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection