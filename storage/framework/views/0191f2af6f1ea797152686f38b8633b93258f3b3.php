<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header">
					<?php if(App::isLocale('en')): ?>
						<?php echo e($category->name_en); ?>

					<?php elseif(App::isLocale('mn')): ?>
						<?php echo e($category->name); ?>

					<?php endif; ?>
				</h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="<?php echo e(url('/')); ?>"><?php echo e(__("messages.Home")); ?></a>
					<span class="divider">/</span>
					<a class="section" href="<?php echo e(url('posts')); ?>"><?php echo e(__("messages.Travel Inspiration")); ?></a>
					<span class="divider">/</span>
					<div class="active section">
						<?php if(App::isLocale('en')): ?>
							<?php echo e($category->name_en); ?>

						<?php elseif(App::isLocale('mn')): ?>
							<?php echo e($category->name); ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-page">
	<div class="ui container ">
		<div class="ui stackable column grid">
			<div class="eleven wide column">
				<?php if($posts->count() > 0): ?>
					<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="ui segment">
							<div class="content">
								<h4 class="ui header blog-header">
									<a href="<?php echo e(url('post', $post->id)); ?>"><?php echo e($post->title); ?></a>
								</h4>
								<div class="ui divided horizontal list">
									<div class="item">
										<img class="ui avatar image" src="<?php echo e(asset($post->user->avatar)); ?>">
										<div class="content">
											<a href="<?php echo e(url('posts/user', $post->user->id)); ?>" class="header"><?php echo e($post->user->name); ?></a>
										</div>
									</div>
									<div class="item">
										<a class="header" href="<?php echo e(url('category', $post->category->id)); ?>">
											<i class="icon folder"></i>
											<?php if(App::isLocale('en')): ?>
												<?php echo e($post->category->name_en); ?>

											<?php elseif(App::isLocale('mn')): ?>
												<?php echo e($post->category->name); ?>

											<?php endif; ?>
										</a>
									</div>
									<div class="item">
										<div class="blog-date">
											<i class="icon calendar"></i><?php echo e(date('Y-m-d', strtotime($post->created_at))); ?>

										</div>
									</div>
									<div class="item">
										<div class="blog-date">
											<i class="icon eye"></i><?php echo e($post->views); ?>

										</div>
									</div>
								</div>
								 
								<div class="ui fluid image">
									<div class="blog-img">
										<img src="<?php echo e(asset(unserialize($post->photos)[0])); ?>">
									</div>
								</div>
								<div class="description">
									<?php echo e($post->excerpt); ?>

								</div>
								<div class="ui grid">
									<div class="ten wide column">
										<div class="social-link">
											<!-- social buttons here -->
										</div>
									</div>
									<div class="six wide column">
										<a class="ui right floated primary button" href="<?php echo e(url('post', $post->id)); ?>"><?php echo e(__("messages.Read More")); ?></a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($posts->links()); ?>

				<?php else: ?>
					<div class="ui segment"><?php echo e(__("messages.Not found")); ?></div>
				<?php endif; ?>
			</div>
			<?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>