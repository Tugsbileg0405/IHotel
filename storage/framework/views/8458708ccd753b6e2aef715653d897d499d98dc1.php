<?php $__env->startSection('title', 'Буудал засах'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<form class="ui form green segment" action="<?php echo e(url('profile/hotel', $hotel->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<?php echo e(method_field('PUT')); ?>

		<h4 class="ui header">Буудал засах</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Эрэмбэ</label>
			<input type="text" name="priority" value="<?php echo e($hotel->priority); ?>">
		</div>
	    <div class="required field">
	    	<label>Идэвхитэй эсэх</label>
			<select class="ui dropdown" name="published">
				<option value="1" <?php echo e($hotel->published ? 'selected' : ''); ?>>Тийм</option>
				<option value="0" <?php echo e($hotel->published ? '' : 'selected'); ?>>Үгүй</option>
			</select>
		</div>
	    <div class="required field">
	    	<label>Хямдралтай эсэх</label>
			<select class="ui dropdown" name="sale">
				<option value="1" <?php echo e($hotel->sale ? 'selected' : ''); ?>>Тийм</option>
				<option value="0" <?php echo e($hotel->sale ? '' : 'selected'); ?>>Үгүй</option>
			</select>
		</div>
		<div class="field">
			<button class="ui button primary" type="submit">Хадгалах</button>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.ui.form').form({
		    inline: true,
		    fields: {
		        priority: {
		            identifier: 'priority',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Эрэмбэ оруулна уу'
		                },
		                {
			                type   : 'integer',
			                prompt : 'Эрэмбэ зөвхөн тоо оруулна уу'
		                },
		                {
		                    type   : 'maxLength[10]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		    },
		    onSuccess: function() {
		    	$('.ui.form button').addClass('loading disabled');
		    }
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>