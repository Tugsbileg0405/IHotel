<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
    <div class="ui green segment">
    	<h4 class="ui header"><?php echo e(__('messages.Change password')); ?></h4>
    	<div class="ui divider"></div>
        <?php if(session('status')): ?>
            <div class="ui success message">
                <i class="check icon"></i><?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
    	<form class="ui form" id="password-reset-form" action="<?php echo e(url('profile/password')); ?>" method="POST">
    		<?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

    		<div class="two fields">
    	        <div class="requried field">
    	            <input type="password" name="password" placeholder="<?php echo e(__('messages.Password')); ?>">
    	        </div>
    	        <div class="requried field">
    	            <input type="password" name="password_confirmation" placeholder="<?php echo e(__('messages.Confirm Password')); ?>">
    	        </div>
    		</div>
    		<button class="ui right floated primary button" type="submit"><?php echo e(__('messages.Save')); ?></button>
    		<br></br>
    	</form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $('#password-reset-form').form({
        inline : true,
        fields: {
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
                        type   : 'match[password]',
                        prompt : '<?php echo e(__("form.Password doesnt match")); ?>'

                    }
                ]
            },
        },
        onSuccess: function() {
            $(this).find('button').addClass('loading disabled');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>