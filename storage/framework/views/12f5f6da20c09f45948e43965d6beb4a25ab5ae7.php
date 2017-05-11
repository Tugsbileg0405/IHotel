<?php $__env->startSection('title', '404'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">Not found</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="<?php echo e(url('/')); ?>"><?php echo e(__("messages.Home")); ?></a>
					<span class="divider">/</span>
					<div class="active section">Not found</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container">
		<div style="text-align: center;padding: 100px 0;">
	    	<h1 style="font-size: 4em">404</h1>
	    	<p><?php echo e(__("messages.Sorry, we couldn't find that page")); ?></p>
	    </div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>