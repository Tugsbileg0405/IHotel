<header style="z-index:9999">
    <div class="ui container">
        <div class="cd-logo">
            <a href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('img/logo-white.png')); ?>" alt="Logo">
            </a>
        </div>
        <div class="important-word">
            <i class="spinner loading icon"></i><?php echo e(__('messages.Collect memories, not a property')); ?>

        </div>
        <nav class="main-nav cd-main-nav-wrapper">
            <ul class="cd-main-nav">
                <?php if(Auth::guest()): ?>
                    <li>
                        <a class="cd-signin" href="#">
                            <i class="user icon"></i><?php echo e(__('messages.Login')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::user()): ?>
                    <li>
                        <a href="<?php echo e(url('profile')); ?>">
                            <i class="user icon"></i><?php echo e(Auth::user()->name); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="power icon"></i><?php echo e(__('messages.Log out')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="#" class="cd-subnav-trigger"><span><?php echo e(__('messages.Menu')); ?></span></a>
                    <ul>
                        <li><a href="<?php echo e(url('posts')); ?>"><?php echo e(__('messages.Travel Inspiration')); ?></a></li>
                        <li><a href="<?php echo e(url('question')); ?>"><?php echo e(__('messages.Frequently asked questions')); ?></a></li>
                        <li><a href="<?php echo e(url('terms')); ?>"><?php echo e(__('messages.Terms of service')); ?></a></li>
                    </ul>
                </li>
                <li class="lang-switcher">
                    <?php if(App::isLocale('en')): ?>
                        <a href="<?php echo e(url('change/mn')); ?>">
                            <img src="<?php echo e(asset('img/mgl.png')); ?>">
                        </a>
                    <?php elseif(App::isLocale('mn')): ?>
                        <a href="<?php echo e(url('change/en')); ?>">
                            <img src="<?php echo e(asset('img/eng.png')); ?>">
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
        <a href="#" class="cd-nav-trigger"><span></span></a>
    </div>
</header>
<main class="cd-main-content"></main>
<?php if(Auth::guest()): ?>
    <div class="cd-user-modal">
        <div class="cd-user-modal-container">
            <ul class="cd-switcher">
                <li><a href="#"><?php echo e(__('messages.Login')); ?></a></li>
                <li><a href="#"><?php echo e(__('messages.Register')); ?></a></li>
            </ul>
            <div id="cd-login">
                <form class="ui form" id="login-form">
                    <?php echo e(csrf_field()); ?>

                    <div class="field">
                        <input type="text" name="email" placeholder="<?php echo e(__('messages.Email')); ?>">
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="<?php echo e(__('messages.Password')); ?>">
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="remember" class="hidden">
                            <label><?php echo e(__('messages.Remember me')); ?></label>
                        </div>
                    </div>
                    <div class="field">
                        <button class="ui default fluid button" type="submit"><?php echo e(__('messages.Login')); ?></button>
                    </div>
                    <p class="cd-form-bottom-message">
                        <a href="<?php echo e(url('/password/reset')); ?>"><?php echo e(__('messages.Forgot password?')); ?></a>
                    </p>
                </form>
                <div id="login-message"></div>
            </div>
            <div id="cd-signup">
                <form class="ui form" id="register-form">
                    <?php echo e(csrf_field()); ?>

                    <div class="field">
                        <input type="text" name="name" placeholder="<?php echo e(__('messages.Name')); ?>">
                    </div>
                    <div class="field">
                        <input type="text" name="surname" placeholder="<?php echo e(__('messages.Surname')); ?>">
                    </div>
                    <div class="field">
                        <input type="email" name="email" placeholder="<?php echo e(__('messages.Email')); ?>">
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="<?php echo e(__('messages.Password')); ?>">
                    </div>
                    <div class="field">
                        <input type="password" name="password_confirmation" placeholder="<?php echo e(__('messages.Confirm Password')); ?>">
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="terms" class="hidden">
                            <label><?php echo e(__('messages.I agree')); ?></label>
                        </div>
                    </div>
                    <button class="ui fluid button" type="submit"><?php echo e(__('messages.Register')); ?></button>
                    <p><a href="<?php echo e(url('terms')); ?>" target="_blank"><?php echo e(__('messages.Check terms and conditions')); ?></a></p>
                </form>
                <div id="register-message"></div>
            </div>
            <div id="cd-reset-password">
                <p class="ui center aligned container"><?php echo e(__('messages.Forgot password? Please enter your email registered on this site')); ?></p>
                <form class="ui form" id="reset-form">
                    <?php echo e(csrf_field()); ?>

                    <div class="field">
                        <input type="text" name="email" placeholder="<?php echo e(__('messages.Email')); ?>">
                    </div>
                    <button class="ui fluid button" type="submit"><?php echo e(__('messages.Reset password')); ?></button>
                    <p class="cd-form-bottom-message"><a href="#"><?php echo e(__('messages.Back')); ?></a></p>
                </form>
                <div id="reset-message"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
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
                    prompt: '<?php echo e(__("form.Please enter your email")); ?>'
                }]
            },
            password: {
                identifier: 'password',
                rules: [{
                    type: 'empty',
                    prompt: '<?php echo e(__("form.Please enter your password")); ?>'
                }]
            },
        },
        onSuccess: function() {
            $('#login-form button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('login')); ?>",
                data: $("#login-form").serialize(),
                success: function() {
                    $('#login-form button').removeClass('loading');
                    $('#login-message').html('<div class="ui success message"></i><?php echo e(__("auth.wait")); ?><i class="ui tiny active inline loader"></div>');
                    window.location.href = "<?php echo e(url('/')); ?>";
                },
                error: function(){
                    $('#login-form button').removeClass('loading disabled');
                    $('#login-message').html('<div class="ui warning message"><?php echo e(__("auth.failed")); ?></div>');
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
                        prompt: '<?php echo e(__("form.Please enter your name")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            surname: {
                identifier: 'surname',
                rules: [
                    {
                        type: 'empty',
                        prompt: '<?php echo e(__("form.Please enter your surname")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            email: {
                identifier: 'email',
                rules: [
                    {
                        type: 'email',
                        prompt: '<?php echo e(__("form.Please enter your email")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            password: {
                identifier: 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter your password")); ?>'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : '<?php echo e(__("form.Please enter at least 6 characters")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            password_confirmation: {
                identifier: 'password_confirmation',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter your password")); ?>'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : '<?php echo e(__("form.Please enter at least 6 characters")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            terms: {
                identifier: 'terms',
                rules: [
                    {
                        type: 'checked',
                        prompt : '<?php echo e(__("form.Please agree terms of service")); ?>'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#register-form button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('register')); ?>",
                data: $("#register-form").serialize(),
                success: function() {
                    $('#register-form button').removeClass('loading');
                    $('#register-message').html('<div class="ui success message"></i><?php echo e(__("auth.wait")); ?><i class="ui tiny active inline loader"></div>');
                    window.location.href = "<?php echo e(url('/')); ?>";
                },
                error: function(data){
                    $('#register-form button').removeClass('loading disabled');
                    if (data.responseText.email != 'undefined') {
                        $('#register-message').html('<div class="ui warning message"><?php echo e(__("auth.emailunique")); ?></div>');
                    }
                    else {
                        if (data.responseText.password != 'undefined') {
                            $('#register-message').html('<div class="ui warning message">Нууц үг буруу байна</div>');
                        }
                    }
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
                        prompt: '<?php echo e(__("form.Please enter your email")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#reset-form button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('password/email')); ?>",
                data: $("#reset-form").serialize(),
                success: function() {
                    $('#reset-form button').removeClass('loading disabled');
                    $('#reset-message').html('<div class="ui success message"><?php echo e(__("messages.Successfully sent")); ?><div>');
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