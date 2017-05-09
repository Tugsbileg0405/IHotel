<?php $__env->startSection('title', 'Ханш'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<form class="ui form green segment" action="<?php echo e(url('profile/option')); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<?php echo e(method_field('PUT')); ?>

		<h4 class="ui header">Ханш</h4>
		<div class="ui divider"></div>
    	<div class="required field">
    		<label>Долларын ханш (₮)</label>
			<input type="text" value="<?php echo e($option->value); ?>" name="option-7">
		</div>
		<div class="field">
			<button class="ui button primary" type="submit">Хадгалах</button>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('.ui.form').form({
	    inline : true,
	    fields: {
	        option7: {
	            identifier: 'option-7',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Утга оруулна уу'
	                },
	                {
		                type   : 'number',
		                prompt : 'Тоо оруулна уу'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
	    	$('.ui.form button').addClass('loading disabled');
	    }
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>