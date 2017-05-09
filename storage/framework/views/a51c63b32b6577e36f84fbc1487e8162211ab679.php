<?php if($categories->count() > 0): ?>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($category->id); ?></td>
					<td><?php echo e($category->name); ?></td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/postcategory/'.$category->id.'/edit')); ?>">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($category->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($categories->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>