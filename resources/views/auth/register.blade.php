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
                                        <a class="item" href="{{ url('login') }}">{{ __('messages.Login') }}</a>
                                        <a class="active item" href="{{ url('register') }}">{{ __('messages.Register') }}</a>
                                    </div>
                                    <div class="ui bottom attached segment">
                                        <form class="ui form" id="register" action="{{ url('register') }}" method="POST">
                                            {{ csrf_field() }}
                                            <img class="ui centered tiny image hotel-add" src="{{ asset('img/marker.png') }}">
                                            <h6 class="ui horizontal header divider ihotel-title">{{ __('messages.Register') }}</h6>
                                            <div class="field{{ $errors->has('email') ? ' error' : '' }}">
                                                <input type="email" name="email" placeholder="{{ __('messages.Email') }}" value="{{ old('email') }}">
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
                                                <input type="password" name="password_confirmation" placeholder="{{ __('messages.Confirm Password') }}">
                                            </div>
                                            <div class="field">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="terms" class="hidden">
                                                    <label> {{ __('messages.I agree') }}</label>
                                                </div>
                                            </div>
                                            <button class="ui fluid button" type="submit">{{ __('messages.Register') }}</button>
                                            <p><a href="#">{{ __('messages.Check terms and conditions') }}</a></p>
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
    $('#register').form({
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
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter your password") }}'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : '{{ __("form.Please enter at least 6 characters") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            password_confirmation: {
                identifier: 'password_confirmation',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '{{ __("form.Please enter your password") }}'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : '{{ __("form.Please enter at least 6 characters") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            terms: {
                identifier: 'terms',
                rules: [
                    {
                        type: 'checked',
                        prompt : '{{ __("form.Please agree terms of service") }}'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#register button').addClass('loading disabled');
        }
    });
</script>
@endpush