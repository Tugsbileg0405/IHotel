<div class="comment">
	<a class="avatar">
		<img src="<?php echo e(asset($comment->user->avatar)); ?>">
	</a>
	<div class="content">
		<a class="author"><?php echo e($comment->user->name); ?></a>
		<div class="metadata">
			<span class="date"><?php echo e(date('Y-m-d h:i:sa', strtotime($comment->created_at))); ?></span>
		</div>
		<div class="text"><?php echo e($comment->content); ?></div>
	</div>
</div>