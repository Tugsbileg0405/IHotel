<?php if($comments->count() > 0): ?>
	<table class="ui selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>Тайлбар</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($comment->id); ?></td>
					<td><?php echo e($comment->name); ?></td>
					<td><?php echo e($comment->description); ?></td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/comment/'.$comment->id.'/edit')); ?>">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($comment->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($comments->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>