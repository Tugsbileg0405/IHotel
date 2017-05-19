@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header">{{ __('messages.Login') }}</h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section">{{ __('messages.Home') }}</a>
                    <span class="divider">/</span>
                    <div class="active section">{{ __('messages.Login') }}</div>
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
                            <div class="ui three column row">
                                <div class="column"></div>
                                <div class="column">
                                    <div class="ui top attached tabular menu">
                                        <a class="active item" href="{{ url('login') }}">{{ __('messages.Login') }}</a>
                                        <a class="item" href="{{ url('register') }}">{{ __('messages.Register') }}</a>
                                    </div>
                                    <div class="ui bottom attached segment">
                                        @if (session('activation'))
                                            <div class="ui success message">
                                                <div class="header">{{ __('messages.Thank you') }}</div>
                                                <p>{{ __('messages.Successfully registered.') }}</p>
                                            </div>
                                        @endif
                                        <form class="ui form" id="login" action="{{ url('login') }}" method="POST">
                                            {{ csrf_field() }}
                                            <img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
                                            <h6 class="ui horizontal header divider ihotel-title">{{ __('messages.Login') }}</h6>
                                            <div class="field{{ $errors->has('email') ? ' error' : '' }}">
                                                <input type="text" name="email" placeholder="{{ __('messages.Email') }}" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <div class="ui basic red pointing prompt label transition visible">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="field{{ $errors->has('password') ? ' error' : '' }}">
                                                <input type="password" name="password" placeholder="{{ __('messages.Password') }}">
                                                @if ($errors->has('password'))
                                                    <div class="ui basic red pointing prompt label transition visible">
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="field">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="remember" class="hidden">
                                                    <label>{{ __('messages.Remember me') }}</label>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <button class="ui default fluid button" type="submit">{{ __('messages.Login') }}</button>
                                            </div>
                                            <p class="cd-form-bottom-message">
                                                <a href="{{ url('/password/reset') }}">{{ __('messages.Forgot password?') }}</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <div class="column"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $("#login").form({
        inline: true,
        fields: {
            email: {
                identifier: 'email',
                rules: [
                    {
                        type: 'email',
                        prompt: '{{ __("form.Please enter your email") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            password: {
                identifier: 'password',
                rules: [
                    {
                        type: 'empty',
                        prompt: '{{ __("form.Please enter your password") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#login button').addClass('loading disabled');
        }
    });
</script>
@endpush