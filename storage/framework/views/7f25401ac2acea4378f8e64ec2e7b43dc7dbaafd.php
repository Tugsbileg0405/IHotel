<?php if($informations->count() > 0): ?>
	<table class="ui selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($information->id); ?></td>
					<td><?php echo e($information->title); ?></td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/information/'.$information->id.'/edit')); ?>">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($information->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($informations->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>