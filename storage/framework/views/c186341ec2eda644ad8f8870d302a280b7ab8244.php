<?php if($closes->count() > 0): ?>
	<div class="ui divider"></div>
	<h4 class="ui header">Өрөөний хаалт</h4>
	<table class="ui stackable selectable table">
		<thead>
			<tr>
				<th>Өрөөний тоо</th>
				<th>Эхлэх өдөр</th>
				<th>Дуусах өдөр</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $closes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $close): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($close->number); ?> өрөө</td>
					<td><?php echo e($close->startdate); ?></td>
					<td><?php echo e($close->enddate); ?></td>
					<td>
						<button class="ui red button" data-id="<?php echo e($close->id); ?>" type="button">Цуцлах</button>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
<?php endif; ?>