<?php if($posts->count() >0): ?>
	<table class="ui selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Гарчиг</th>
				<th>Ангилал</th>
				<th>Нийтэлсэн</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($post->id); ?></td>
					<td><?php echo e($post->title); ?></td>
					<td><?php echo e($post->category->name); ?></td>
					<td><?php echo e($post->user->name); ?></td>
					<td>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($post->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($posts->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>