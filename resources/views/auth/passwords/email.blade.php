@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header">{{ __('messages.Forgot password?') }}</h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section">{{ __('messages.Home') }}</a>
                    <span class="divider">/</span>
                    <div class="active section">{{ __('messages.Forgot password?') }}</div>
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
                                    <form class="ui form segment" id="reset">
                                        {{ csrf_field() }}
                                        <h4 class="ui header">{{ __('messages.Forgot password?') }}</h4>
                                        <div class="ui divider"></div>
                                        <p class="ui center aligned container">{{ __('messages.Forgot password? Please enter your email registered on this site') }}</p>
                                        <div class="field{{ $errors->has('email') ? ' error' : '' }}">
                                            <input type="email" name="email" placeholder="{{ __('messages.Email') }}" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <div class="ui basic red pointing prompt label transition visible">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="field">
                                            <button class="ui default fluid button" type="submit">{{ __('messages.Send reset password link') }}</button>
                                        </div>
                                    </form>
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
<div class="ui basic modal" id="success-message">
    <div class="ui icon header">
        <i class="green check icon"></i>
            {{ __('messages.Successfully sent') }}
    </div>
</div>
<div class="ui basic modal" id="error-message">
    <div class="ui icon header">
        <i class="red close icon"></i>
            {{ __('messages.Error occured') }}
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $("#reset").submit(function(e) {
        e.preventDefault(); 
    }).form({
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
        },
        onSuccess: function() {
            $('#reset button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "{{ url('password/email') }}",
                data: $("#reset").serialize(),
                success: function() {
                    $('#reset button').removeClass('loading disabled');
                    $('#success-message').modal('show');
                },
                error: function(){
                    $('#reset button').removeClass('loading disabled');
                    $('#error-message').modal('show');
                }
            });
        }
    });
</script>
@endpush