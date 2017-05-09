<?php $__env->startSection('title', 'Үйлчилгээний нөхцөл'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<form class="ui form green segment" action="<?php echo e(url('profile/term', $term->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<?php echo e(method_field('PUT')); ?>

		<h4 class="ui header">Үйлчилгээний нөхцөл засах</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Гарчиг</label>
			<input type="text" name="title" value="<?php echo e($term->title); ?>">
		</div>
	    <div class="required field">
	    	<label>Агуулга</label>
	    	<textarea name="content"><?php echo e($term->content); ?></textarea>
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
		        title: {
		            identifier: 'title',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Гарчиг оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        content: {
		            identifier: 'content',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Агуулга оруулна уу'
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