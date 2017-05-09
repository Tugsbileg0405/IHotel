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
                                        <a class="item" href="<?php echo e(url('login')); ?>"><?php echo e(__('messages.Login')); ?></a>
                                        <a class="active item" href="<?php echo e(url('register')); ?>"><?php echo e(__('messages.Register')); ?></a>
                                    </div>
                                    <div class="ui bottom attached segment">
                                        <form class="ui form" id="register" action="<?php echo e(url('register')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
                                            <h6 class="ui horizontal header divider ihotel-title"><?php echo e(__('messages.Register')); ?></h6>
                                            <div class="field<?php echo e($errors->has('name') ? ' error' : ''); ?>">
                                                <input type="text" name="name" placeholder="<?php echo e(__('messages.Name')); ?>" value="<?php echo e(old('name')); ?>">
                                                <?php if($errors->has('name')): ?>
                                                    <div class="ui basic red pointing prompt label transition visible">
                                                        <?php echo e($errors->first('name')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="field<?php echo e($errors->has('surname') ? ' error' : ''); ?>">
                                                <input type="text" name="surname" placeholder="<?php echo e(__('messages.Surname')); ?>" value="<?php echo e(old('surname')); ?>">
                                                <?php if($errors->has('surname')): ?>
                                                    <div class="ui basic red pointing prompt label transition visible">
                                                        <?php echo e($errors->first('surname')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="field<?php echo e($errors->has('email') ? ' error' : ''); ?>">
                                                <input type="email" name="email" placeholder="<?php echo e(__('messages.Email')); ?>" value="<?php echo e(old('email')); ?>">
                                                <?php if($errors->has('email')): ?>
                                                    <div class="ui basic red pointing prompt label transition visible">
                                                        <?php echo e($errors->first('email')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="field<?php echo e($errors->has('country') ? ' error' : ''); ?>">
                                                <input type="text" name="country" placeholder="<?php echo e(__('messages.Country')); ?>" value="<?php echo e(old('country')); ?>">
                                                <?php if($errors->has('country')): ?>
                                                    <div class="ui basic red pointing prompt label transition visible">
                                                        <?php echo e($errors->first('country')); ?>

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
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="terms" class="hidden">
                                                    <label> <?php echo e(__('messages.I agree')); ?></label>
                                                </div>
                                            </div>
                                            <button class="ui fluid button" type="submit"><?php echo e(__('messages.Register')); ?></button>
                                            <p><a href="#"><?php echo e(__('messages.Check terms and conditions')); ?></a></p>
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
    $('#register').form({
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
            $('#register button').addClass('loading disabled');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>