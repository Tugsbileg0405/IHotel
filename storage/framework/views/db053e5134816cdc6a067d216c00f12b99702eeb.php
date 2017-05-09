<?php if($users->count() > 0): ?>
	<table class="ui selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Нэр</th>
				<th>И-мэйл</th>
				<th>Эрх</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($user->id); ?></td>
					<td><?php echo e($user->name); ?></td>
					<td><?php echo e($user->email); ?></td>
					<td>
						<?php if($user->isAdmin()): ?>
							Админ
						<?php else: ?> 
							Хэрэглэгч
						<?php endif; ?>
					</td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/user/'.$user->id.'/edit')); ?>">
							<i class="pencil icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($users->links()); ?>

<?php else: ?>
	<p>Илэрц олдсонгүй</p>
<?php endif; ?>