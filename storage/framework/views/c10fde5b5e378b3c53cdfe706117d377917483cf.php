<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="ui segment">
			<h4 class="ui header">
				<?php if(App::isLocale('en')): ?>
					<?php if($hotel->name_en): ?>
						<?php echo e($hotel->name_en); ?>

					<?php else: ?>
						<?php echo e($hotel->name); ?>

					<?php endif; ?>
				<?php elseif(App::isLocale('mn')): ?>
					<?php echo e($hotel->name); ?>

				<?php endif; ?>
			</h4>
			<div class="ui middle horizontal divided list">
				<div class="item">
					<div class="content">
						<?php for($i=0;$i<$hotel->star;$i++): ?>
							<i class="yellow star icon"></i>
						<?php endfor; ?>
						<div class="ui label">
							<i class="icon calendar"></i><?php echo e(date('Y-m-d', strtotime($hotel->created_at))); ?>

						</div>
					</div>
				</div>
			</div>
			<a class="ui primary right floated button" href="<?php echo e(url('admin/hotel', $hotel->id)); ?>"><?php echo e(__('messages.Read More')); ?></a>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($hotels->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>