<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header"><?php echo e(__('messages.Login')); ?></h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section"><?php echo e(__('messages.Home')); ?></a>
                    <span class="divider">/</span>
                    <div class="active section"><?php echo e(__('messages.Login')); ?></div>
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
                                        <a class="active item" href="<?php echo e(url('login')); ?>"><?php echo e(__('messages.Login')); ?></a>
                                        <a class="item" href="<?php echo e(url('register')); ?>"><?php echo e(__('messages.Register')); ?></a>
                                    </div>
                                    <div class="ui bottom attached segment">
                                        <?php if(session('activation')): ?>
                                            <div class="ui success message">
                                               <i class="check icon"></i> Successfully registered
                                            </div>
                                        <?php endif; ?>
                                        <form class="ui form" id="login" action="<?php echo e(url('login')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
                                            <h6 class="ui horizontal header divider ihotel-title"><?php echo e(__('messages.Login')); ?></h6>
                                            <div class="field<?php echo e($errors->has('email') ? ' error' : ''); ?>">
                                                <input type="text" name="email" placeholder="<?php echo e(__('messages.Email')); ?>" value="<?php echo e(old('email')); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $("#login").form({
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
                        type: 'empty',
                        prompt: '<?php echo e(__("form.Please enter your password")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#login button').addClass('loading disabled');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>