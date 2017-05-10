<?php if($hotels->count() > 0): ?>	
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>Ангилал</th>
				<th>Өрөөний тоо</th>
				<th>Од</th>
				<th>Эрэмбэ</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($hotel->id); ?></td>
					<td><?php echo e($hotel->name); ?></td>
					<td><?php echo e($hotel->category->name); ?></td>
					<td><?php echo e($hotel->room_number); ?></td>
					<td>
						<?php for($i=0; $i<$hotel->star; $i++): ?>
							<i class="icon yellow star"></i>
						<?php endfor; ?>
					</td>
					<td><?php echo e($hotel->priority); ?></td>
					<td>
						<a class="ui icon button open-EditModal" data-key="<?php echo e($key); ?>">
							<i class="pencil icon"></i>
						</a>
					</td>
					<td>
						<a class="ui icon button open-DeleteModal" data-id="<?php echo e($hotel->id); ?>">
							<i class="trash icon"></i>
						</a>
					</td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('admin/hotel', $hotel->id)); ?>">
							<i class="eye icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($hotels->links()); ?>

<?php else: ?>
	Илэрц олдсонгүй
<?php endif; ?>