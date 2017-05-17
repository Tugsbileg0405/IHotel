<?php $__env->startSection('title', 'Буудлын үйлчилгээ'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<form class="ui form green segment" action="<?php echo e(url('profile/hotelservice')); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<h4 class="ui header">Буудлын үйлчилгээ нэмэх</h4>
		<div class="ui divider"></div>
	    <div class="required field">
			<select class="ui disabled fluid dropdown error" name="category">
				<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
			</select>
		</div>
	    <div class="required field">
	    	<label>Нэр</label>
			<input type="text" name="name">
		</div>
	    <div class="required field">
	    	<label>Нэр (Англи)</label>
			<input type="text" name="name_en">
		</div>
	    <div class="field">
	    	<label>Icon</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="icon">
				<i class="dropdown icon"></i>
				<div class="default text">Сонгох</div>
				<div class="menu">
					<?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="item" data-value="<?php echo e($icon); ?>">
							<i class="<?php echo e($icon); ?> icon"></i>
							<span class="text"><?php echo e($icon); ?></span>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
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
		    inline : true,
		    fields: {
		        name: {
		            identifier: 'name',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Үйлчилгээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        name_en: {
		            identifier: 'name_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Үйлчилгээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
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