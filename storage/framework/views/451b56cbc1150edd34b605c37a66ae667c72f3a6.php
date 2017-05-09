<?php $__env->startSection('title', 'Захиалга'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Захиалгын мэдээлэл</h4>
		<div class="ui divider"></div>
		<table class="ui celled padded table">
			<tbody>
				<tr>
					<td>Захиалагч</td>
					<td><?php echo e($order->user->name); ?></td>
				</tr>
				<tr>
					<td>Захиалагчийн и-мэйл</td>
					<td><?php echo e($order->user->email); ?></td>
				</tr>
				<tr>
					<td>Буудал</td>
					<td><?php echo e($order->hotel->name); ?></td>
				</tr>
				<tr>
					<td>Идэвхитэй</td>
					<td><?php echo e($order->is_approved ? 'Тийм' : 'Үгүй'); ?></td>
				</tr>
				<tr>
					<td>Нийт үнэ (*НӨАТ орсон)</td>
					<td><?php echo e($order->price); ?></td>
				</tr>
			</tbody>
		</table>
		<h4 class="ui header">Захиалсан өрөөнүүд</h4>
		<div class="ui divider"></div>
		<table class="ui celled padded table">
			<thead>
				<tr>
					<th>Өрөө</th>
					<th>Эхлэх огноо</th>
					<th>Дуусах огноо</th>
					<th>Хоног</th>
					<th>Үнэ (*НӨАТ орсон)</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = json_decode($order->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($rooms[$key]->name); ?></td>
						<td><?php echo e($order->startdate); ?></td>
						<td><?php echo e(date('Y-m-d', strtotime($order->startdate.' + '.$option->day.' days'))); ?></td>
						<td><?php echo e($option->day); ?></td>
						<td><?php echo e($rooms[$key]->price * $option->day * 1.1); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('.ui.form').form({
	    inline : true,
	    fields: {
	        title: {
	            identifier: 'title',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Гарчиг оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	        subtitle: {
	            identifier: 'subtitle',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Дэд гарчиг оруулна уу'
	                },
	                {
	                    type   : 'maxLength[191]',
	                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
	    	$('.ui.form button').addClass('loading disabled');
	    }
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>