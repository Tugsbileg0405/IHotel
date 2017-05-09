<?php if($orders->count() > 0): ?>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Захиалгын дугаар </th>
				<th>Захиалсан өдөр</th>
				<th>Хүсэлт </th>
				<th>Захиалагчийн нэр</th>
				<th>Зочны нэр</th>
				<th>Ирэх өдөр</th>
				<th>Гарах өдөр</th>
				<th>Нийт төлбөр</th>
				<th>Бодогдох хувь</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr <?php echo e($key%2 == 0 ? 'class=ihotel-blue' : ''); ?>>
					<td class="collapsing">
						<h5 class="ui header">2</h5>
					</td>
					<td class="user-id"><?php echo e($order->number); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($order->created_at))); ?></td>
					<td>Бид</td>
					<td><?php echo e($order->user->name); ?></td>
					<td><?php echo e($order->user->name); ?></td>
					<td><?php echo e($order->startdate); ?></td>
					<td><?php echo e($order->enddate); ?></td>
					<td><?php echo e($order->price); ?></td>
					<td><?php echo e($order->price*0.1); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($orders->links()); ?>

<?php else: ?>
	<div class="ui segment">
		<p>Захиалга олдсонгүй.</p>
	</div>
<?php endif; ?>