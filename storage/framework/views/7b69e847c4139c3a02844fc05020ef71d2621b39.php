<?php if($orders->count() > 0): ?>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Захиалагчийн нэр</th>
				<th>Буудлын нэр</th>
				<th>Ирэх өдөр</th>
				<th>Гарах өдөр</th>
				<th>Нийт үнэ</th>
				<th>Статус</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($order->number); ?></td>
					<td><?php echo e($order->user->name); ?></td>
					<td><?php echo e($order->hotel_name); ?></td>
					<td><?php echo e($order->startdate); ?></td>
					<td><?php echo e($order->enddate); ?></td>
					<td>
						<?php if($order->dollar_rate): ?>
							<?php echo e(number_format($order->price/$order->dollar_rate,2)); ?>

						<?php else: ?>
							<?php echo e(number_format($order->price)); ?>

						<?php endif; ?>
					</td>
					<td>
						<?php if($order->status == 1): ?>
							<span class="ui teal label">Баталгаажаагүй</span>
						<?php elseif($order->status == 2): ?>
							<span class="ui green label">Баталгаажсан</span>
						<?php elseif($order->status == 3): ?>
							<span class="ui red label">Цуцлагдсан</span>
						<?php endif; ?>
					</td>
					<td>
						<a class="ui icon button" href="<?php echo e(url('profile/order/'.$order->id.'/edit')); ?>">
							<i class="eye icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($orders->links()); ?>

<?php else: ?>
	Илэрц олдсонгүй
<?php endif; ?>