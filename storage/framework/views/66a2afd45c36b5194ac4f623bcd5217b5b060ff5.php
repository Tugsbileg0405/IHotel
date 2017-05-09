<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header"><?php echo e(__('messages.Terms of service')); ?></h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section"><?php echo e(__('messages.Home')); ?></a>
					<span class="divider">/</span>
					<div class="active section"><?php echo e(__('messages.Terms of service')); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="sixteen wide column">
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
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>