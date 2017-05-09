<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('hotel.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="twelve wide column">
	<?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="ui segment">
			<?php if(App::isLocale('en')): ?>
				<h4 class="ui header"><?php echo e($term->title_en); ?></h4>
				<p><?php echo e($term->content_en); ?></p>
			<?php elseif(App::isLocale('mn')): ?>
				<h4 class="ui header"><?php echo e($term->title); ?></h4>
				<p><?php echo e($term->content); ?></p>
			<?php endif; ?>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php if($latest): ?>
		<div class="ui segment">
			<h4 class="ui header"><?php echo e(__('messages.Update')); ?></h4>
			<p><?php echo e(__('messages.This terms of service updated on', [ 'date' => date('Y/m/d', strtotime($latest->updated_at))])); ?></p>
		</div>
	<?php endif; ?>
	<form class="ui form" id="create-contract-form" action="<?php echo e(url('hotel/contract', $hotel->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="<?php echo e(url('hotel/payment', $hotel->id)); ?>">Буцах</a>
			<div class="or"></div>
			<button class="ui primary button" type="submit">
				Зөвшөөрч байна<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('#create-contract-form').submit(function() {
    	$(this).find('button').addClass('loading disabled');
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hotel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>