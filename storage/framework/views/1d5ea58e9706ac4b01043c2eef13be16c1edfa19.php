<?php if($room->sales->count() > 0): ?>
	<div class="ui divider"></div>
	<h4 class="ui header">Өрөөний үнэ</h4>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>Өрөөний үнэ</th>
				<?php if($room->price_op): ?>
					<th>Өрөөний үнэ (1 хүний)</th>
				<?php endif; ?>
				<th>Эхлэх өдөр</th>
				<th>Дуусах өдөр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $room->sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($sale->price); ?>₮</td>
					<?php if($room->price_op): ?>
						<td><?php echo e($sale->price_op); ?>₮</td>
					<?php endif; ?>
					<td><?php echo e($sale->startdate); ?></td>
					<td><?php echo e($sale->enddate); ?></td>
					<td>
						<button class="ui red button" data-id="<?php echo e($sale->id); ?>" type="button">Цуцлах</button>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
<?php endif; ?>