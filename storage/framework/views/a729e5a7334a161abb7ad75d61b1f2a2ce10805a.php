<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<?php if($posts->count() > 0): ?>
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="ui segment">
				<h4 class="ui header">
					<a href="<?php echo e(url('post', $post->id)); ?>"><?php echo e($post->title); ?></a>
				</h4>
				<div class="ui mini horizontal divided list">
					<div class="item">
						<i class="icon calendar"></i><?php echo e(date('Y-m-d', strtotime($post->created_at))); ?>

					</div>
					<div class="item">
						<a href="<?php echo e(url('category', $post->category->id)); ?>">
							<i class="icon folder"></i>
							<?php if(App::isLocale('en')): ?>
								<?php echo e($post->category->name_en); ?>

							<?php elseif(App::isLocale('mn')): ?>
								<?php echo e($post->category->name); ?>

							<?php endif; ?>
						</a>
					</div>
					<div class="item">
						<i class="icon eye"></i><?php echo e($post->views); ?>

					</div>
				</div>
				<a class="ui right floated negative icon button open-DeleteModal" data-id="<?php echo e($post->id); ?>">
					<i class="trash icon"></i>
				</a>
				<a class="ui right floated icon button" href="<?php echo e(url('profile/posts/'.$post->id.'/edit')); ?>">
					<i class="pencil icon"></i>
				</a>
			</div>
			<?php echo e($posts->links()); ?>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<div class="ui segment"><?php echo e(__('messages.Have not Post')); ?></div>
	<?php endif; ?>
</div>
<div id="delete-modal" class="ui modal">
	<div class="header"><?php echo e(__('messages.Delete')); ?></div>
	<div class="content">
		<p><?php echo e(__('messages.Are you sure to delete?')); ?></p>
	</div>
	<div class="actions">
		<a class="ui red negative button"><?php echo e(__('messages.No')); ?></a>
		<a class="ui positive right labeled icon button">
			<i class="checkmark icon"></i><?php echo e(__('messages.Yes')); ?>

		</a>
		<form action="" method="POST">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('DELETE')); ?>

		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('.open-DeleteModal').click(function() {
		var id = $(this).data('id');
		$('#delete-modal').modal({
			onApprove : function() {
				$('#delete-modal').find('form').attr('action', "<?php echo e(url('profile/posts')); ?>/" + id);
				$('#delete-modal').find('form').submit();
			}
		}).modal('show');
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>