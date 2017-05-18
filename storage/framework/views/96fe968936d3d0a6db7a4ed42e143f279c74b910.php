<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header"><?php echo e(__('messages.Reset Password')); ?></h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section"><?php echo e(__('messages.Home')); ?></a>
                    <span class="divider">/</span>
                    <div class="active section"><?php echo e(__('messages.Reset Password')); ?></div>
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
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                        <h4 class="ui header"><?php echo e(__('messages.Reset password')); ?></h4>
                                        <div class="ui divider"></div>
                                        <div class="field<?php echo e($errors->has('email') ? ' error' : ''); ?>">
                                            <input type="email" name="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" placeholder="<?php echo e(__('messages.Email')); ?>">
                                            <?php if($errors->has('email')): ?>
                                                <div class="ui basic red pointing prompt label transition visible">
                                                    <?php echo e($errors->first('email')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="field<?php echo e($errors->has('password') ? ' error' : ''); ?>">
                                            <input type="password" name="password" placeholder="<?php echo e(__('messages.Password')); ?>">
                                            <?php if($errors->has('password')): ?>
                                                <div class="ui basic red pointing prompt label transition visible">
                                                    <?php echo e($errors->first('password')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="field">
                                            <input type="password" name="password_confirmation" placeholder="<?php echo e(__('messages.Confirm Password')); ?>">
                                        </div>
                                        <div class="field">
                                            <button class="ui default fluid button" type="submit"><?php echo e(__('messages.Reset password')); ?></button>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
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
                        prompt: '<?php echo e(__("form.Please enter your password")); ?>'
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
                        prompt: '<?php echo e(__("form.Please enter your password")); ?>'
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
        },
        onSuccess: function() {
            $('#password-reset button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('password/reset')); ?>",
                data: $("#password-reset").serialize(),
                success: function(data) {
                    $('#password-reset button').removeClass('loading disabled');
                    $('#password-reset-msg').html('<div class="ui success message">Нууц үг амжилтай шинэчлэгдлээ. Та түр хүлээнэ үү... <i class="ui tiny active inline loader"><div>');
                    window.location.href = "<?php echo e(url('/')); ?>";
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>