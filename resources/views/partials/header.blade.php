<header style="z-index:9999">
    <div class="ui container">
        <div class="cd-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo-white.png') }}" alt="Logo">
            </a>
        </div>
        <div class="important-word">
            <i class="spinner loading icon"></i>{{ __('messages.Collect memories, not a property') }}
        </div>
        <nav class="main-nav cd-main-nav-wrapper">
            <ul class="cd-main-nav">
                @if (Auth::guest())
                    <li>
                        <a class="cd-signin" href="#">
                            <i class="user icon"></i>{{ __('messages.Login') }}
                        </a>
                    </li>
                @endif
                @if (Auth::user())
                    <li>
                        <a href="{{ url('profile') }}">
                            <i class="user icon"></i>{{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="power icon"></i>{{ __('messages.Log out') }}
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                <li>
                    <a href="#" class="cd-subnav-trigger"><span>{{ __('messages.Menu') }}</span></a>
                    <ul>
                        <li><a href="{{ url('posts') }}">{{ __('messages.Travel Inspiration') }}</a></li>
                        <li><a href="{{ url('question') }}">{{ __('messages.Frequently asked questions') }}</a></li>
                        <li><a href="{{ url('terms') }}">{{ __('messages.Terms of service') }}</a></li>
                    </ul>
                </li>
                <li class="lang-switcher">
                    @if (App::isLocale('en'))
                        <a href="{{ url('change/mn') }}">
                            <img src="{{ asset('img/mgl.png') }}">
                        </a>
                    @elseif (App::isLocale('mn'))
                        <a href="{{ url('change/en') }}">
                            <img src="{{ asset('img/eng.png') }}">
                        </a>
                    @endif
                </li>
            </ul>
        </nav>
        <a href="#" class="cd-nav-trigger"><span></span></a>
    </div>
</header>
<main class="cd-main-content"></main>
@if (Auth::guest())
    <div class="cd-user-modal">
        <div class="cd-user-modal-container">
            <ul class="cd-switcher">
                <li><a href="#">{{ __('messages.Login') }}</a></li>
                <li><a href="#">{{ __('messages.Register') }}</a></li>
            </ul>
            <div id="cd-login">
                <form class="ui form" id="login-form">
                    {{ csrf_field() }}
                    <div class="field">
                        <input type="text" name="email" placeholder="{{ __('messages.Email') }}">
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="{{ __('messages.Password') }}">
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
                <div id="login-message"></div>
            </div>
            <div id="cd-signup">
                <form class="ui form" id="register-form">
                    {{ csrf_field() }}
                    <div class="field">
                        <input type="text" name="name" placeholder="{{ __('messages.Name') }}">
                    </div>
                    <div class="field">
                        <input type="text" name="surname" placeholder="{{ __('messages.Surname') }}">
                    </div>
                    <div class="field">
                        <input type="email" name="email" placeholder="{{ __('messages.Email') }}">
                    </div>
                    <div class="field">
                        <input type="text" name="country" placeholder="{{ __('messages.Country') }}">
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="{{ __('messages.Password') }}">
                    </div>
                    <div class="field">
                        <input type="password" name="password_confirmation" placeholder="{{ __('messages.Confirm Password') }}">
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="terms" class="hidden">
                            <label>{{ __('messages.I agree') }}</label>
                        </div>
                    </div>
                    <button class="ui fluid button" type="submit">{{ __('messages.Register') }}</button>
                    <p><a href="{{ url('terms') }}" target="_blank">{{ __('messages.Check terms and conditions') }}</a></p>
                </form>
                <div id="register-message"></div>
            </div>
            <div id="cd-reset-password">
                <p class="ui center aligned container">{{ __('messages.Forgot password? Please enter your email registered on this site') }}</p>
                <form class="ui form" id="reset-form">
                    {{ csrf_field() }}
                    <div class="field">
                        <input type="text" name="email" placeholder="{{ __('messages.Email')}}">
                    </div>
                    <button class="ui fluid button" type="submit">{{ __('messages.Reset password') }}</button>
                    <p class="cd-form-bottom-message"><a href="#">{{ __('messages.Back') }}</a></p>
                </form>
                <div id="reset-message"></div>
            </div>
        </div>
    </div>
@endif
<script type="text/javascript">
    $("#login-form").submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        on: 'blur',
        fields: {
            email: {
                identifier: 'email',
                rules: [{
                    type: 'email',
                    prompt: '{{ __("form.Please enter your email") }}'
                }]
            },
            password: {
                identifier: 'password',
                rules: [{
                    type: 'empty',
                    prompt: '{{ __("form.Please enter your password") }}'
                }]
            },
        },
        onSuccess: function() {
            $('#login-form button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "{{ url('login') }}",
                data: $("#login-form").serialize(),
                success: function() {
                    $('#login-form button').removeClass('loading');
                    $('#login-message').html('<div class="ui success message"></i>{{ __("auth.wait") }}<i class="ui tiny active inline loader"></div>');
                    window.location.href = "{{ url('/') }}";
                },
                error: function(){
                    $('#login-form button').removeClass('loading disabled');
                    $('#login-message').html('<div class="ui warning message">{{ __("auth.failed") }}</div>');
                }
            });
        },
    });
    $("#register-form").submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        fields: {
            name: {
                identifier: 'name',
                rules: [
                    {
                        type: 'empty',
                        prompt: '{{ __("form.Please enter your name") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
            surname: {
                identifier: 'surname',
                rules: [
                    {
                        type: 'empty',
                        prompt: '{{ __("form.Please enter your surname") }}'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '{{ __("form.Please enter at most 191 characters") }}'
                    }
                ]
            },
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
            country: {
                identifier: 'country',
                rules: [
                    {
                        type: 'empty',
                        prompt: '{{ __("form.Please enter your country") }}'
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
            $('#register-form button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "{{ url('register') }}",
                data: $("#register-form").serialize(),
                success: function() {
                    $('#register-form button').removeClass('loading');
                    $('#register-message').html('<div class="ui success message"></i>{{ __("auth.failed") }}<i class="ui tiny active inline loader"></div>');
                    window.location.href = "{{ url('/') }}";
                },
                error: function(data){
                    $('#register-form button').removeClass('loading disabled');
                    var errors = data.responseJSON;
                    var registererror = '<div class="ui warning message"><ul>';
                    $.each(errors, function( key, value ) {
                        registererror += '<li>' + value[0] + '</li>';
                    });
                    registererror += '</div></ul>';
                    $('#register-message').html(registererror);
                }
            });
        }
    });
    $("#reset-form").submit(function(e) {
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
            $('#reset-form button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "{{ url('password/email') }}",
                data: $("#reset-form").serialize(),
                success: function() {
                    $('#reset-form button').removeClass('loading disabled');
                    $('#reset-message').html('<div class="ui success message">{{ __("messages.Successfully sent") }}<div>');
                },
                error: function(data){
                    $('#reset-form button').removeClass('loading disabled');
                    var errors = data.responseJSON;
                    var registererror = '<div class="ui warning message"><ul>';
                    $.each(errors, function( key, value ) {
                        registererror += '<li>' + value[0] + '</li>';
                    });
                    registererror += '</div></ul>';
                    $('#reset-message').html(registererror);
                }
            });
        }
    });
</script>