@extends('layouts.app')

@section('title', 'iHotel')

@section('content')
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header">{{ __('messages.Reset Password')}}</h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section">{{ __('messages.Home')}}</a>
                    <span class="divider">/</span>
                    <div class="active section">{{ __('messages.Reset Password')}}</div>
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
                                    <form class="ui form segment" id="password-reset">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <h4 class="ui header">{{ __('messages.Reset password') }}</h4>
                                        <div class="ui divider"></div>
                                        <div class="field{{ $errors->has('email') ? ' error' : '' }}">
                                            <input type="email" name="email" value="{{ $email or old('email') }}" placeholder="{{ __('messages.Email')}}">
                                            @if ($errors->has('email'))
                                                <div class="ui basic red pointing prompt label transition visible">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="field{{ $errors->has('password') ? ' error' : '' }}">
                                            <input type="password" name="password" placeholder="{{ __('messages.Password')}}">
                                            @if ($errors->has('password'))
                                                <div class="ui basic red pointing prompt label transition visible">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="field">
                                            <input type="password" name="password_confirmation" placeholder="{{ __('messages.Confirm Password')}}">
                                        </div>
                                        <div class="field">
                                            <button class="ui default fluid button" type="submit">{{ __('messages.Reset password')}}</button>
                                        </div>
                                    </form>
                                    <div id="password-reset-msg"></div>
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
    $("#password-reset").submit(function(e) {
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
            password: {
                identifier: 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt: '{{ __("form.Please enter your password") }}'
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
                        prompt: '{{ __("form.Please enter your password") }}'
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
        },
        onSuccess: function() {
            $('#password-reset button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "{{ url('password/reset') }}",
                data: $("#password-reset").serialize(),
                success: function(data) {
                    $('#password-reset button').removeClass('loading disabled');
                    $('#password-reset-msg').html('<div class="ui success message">Нууц үг амжилтай шинэчлэгдлээ. Та түр хүлээнэ үү... <i class="ui tiny active inline loader"><div>');
                    window.location.href = "{{ url('/') }}";
                },
                error: function(data){
                    $('#password-reset button').removeClass('loading disabled');
                    var errors = data.responseJSON;
                    var reseterror = '<div class="ui warning message"><ul>';
                    $.each(errors, function( key, value ) {
                        reseterror += '<li>' + value[0] + '</li>';
                    });
                    reseterror += '</div></ul>';
                    $('#password-reset-msg').html(reseterror);
                }
            });
        }
    });
</script>
@endpush