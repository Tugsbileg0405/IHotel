<?php if($terms->count() > 0): ?>
	<table class="ui selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Гарчиг</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($term->id); ?></td>
					<td><?php echo e($term->title); ?></td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/term/'.$term->id.'/edit')); ?>">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($term->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($terms->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>