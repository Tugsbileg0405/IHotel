<?php if($questions->count() > 0): ?>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Асуулт</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($question->id); ?></td>
					<td><?php echo e($question->question); ?></td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/question/'.$question->id.'/edit')); ?>">
							<i class="pencil icon"></i>
						</a>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($question->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($questions->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>