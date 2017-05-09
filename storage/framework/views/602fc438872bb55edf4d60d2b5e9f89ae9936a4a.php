<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header"><?php echo e(__("messages.Frequently asked questions")); ?></h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section"><?php echo e(__("messages.Home")); ?></a>
					<span class="divider">/</span>
					<div class="active section"><?php echo e(__("messages.Frequently asked questions")); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div class="ui styled accordion fluid segments">
			<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="title">
					<i class="dropdown icon"></i>
					<?php if(App::isLocale('en')): ?>
						<?php echo e($question->question_en); ?>

					<?php elseif(App::isLocale('mn')): ?>
						<?php echo e($question->question); ?>

					<?php endif; ?>
				</div>
				<div class="content">
					<?php if(App::isLocale('en')): ?>
						<p><?php echo e($question->answer_en); ?></p>
					<?php elseif(App::isLocale('mn')): ?>
						<p><?php echo e($question->answer); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>