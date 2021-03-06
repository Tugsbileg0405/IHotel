<?php $__env->startSection('title', 'Захиалга'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Захиалгын мэдээлэл</h4>
		<div class="ui divider"></div>
		<table class="ui celled padded table">
			<tbody>
				<tr>
					<td>Захиалагчийн нэр</td>
					<td><?php echo e($order->user->name); ?></td>
				</tr>
				<tr>
					<td>Захиалагчийн и-мэйл</td>
					<td><?php echo e($order->user->email); ?></td>
				</tr>
				<tr>
					<td>Буудлын нэр</td>
					<td><?php echo e($order->hotel_name); ?></td>
				</tr>
				<tr>
					<td>Захиалсан өдөр</td>
					<td><?php echo e(date('Y-m-d', strtotime($order->created_at))); ?></td>
				</tr>
				<tr>
					<td>Ирэх өдөр</td>
					<td><?php echo e($order->startdate); ?></td>
				</tr>
				<tr>
					<td>Гарах өдөр</td>
					<td><?php echo e($order->enddate); ?></td>
				</tr>
				<?php if($order->pickup_service): ?>
					<tr>
						<td>Онгоцны буудлаас тосох</td>
						<td><?php echo e($order->pickup_service == 1 ? 'SIXT' : 'Энгийн'); ?></td>
					</tr>
				<?php endif; ?>
				<tr>
					<td>Хоног</td>
					<td><?php echo e($order->day); ?></td>
				</tr>
				<tr>
					<td>Нийт үнэ (*НӨАТ орсон)</td>
					<td>
						<?php if($order->price_dollar): ?>
							<?php echo e(number_format($order->price_dollar)); ?>

						<?php else: ?>
							<?php echo e(number_format($order->price)); ?>

						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<h4 class="ui header">Захиалсан өрөөнүүд</h4>
		<div class="ui divider"></div>
		<table class="ui celled padded table">
			<thead>
				<tr>
					<th>Өрөө</th>
					<th>Өрөөний тоо</th>
					<th>Өрөөний үнэ/хоног</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = json_decode($order->rooms); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($rooms[$key]->name); ?></td>
						<td><?php echo e($room->room_number); ?></td>
						<td><?php echo e(number_format($rooms[$key]->price)); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<h4 class="ui header">Картын мэдээлэл</h4>
		<div class="ui divider"></div>
		<table class="ui celled padded table">
			<thead>
				<tr>
					<th>Картын дугаар</th>
					<th>Картан дээрх нэр</th>
					<th>Хүчинтэй хугацаа</th>
					<th>CVV код</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo e(json_decode($order->carddata)->cardnumber); ?></td>
					<td><?php echo e(json_decode($order->carddata)->cardname); ?></td>
					<td><?php echo e(json_decode($order->carddata)->expirymonth); ?>/<?php echo e(json_decode($order->carddata)->expiryyear); ?></td>
					<td><?php echo e(json_decode($order->carddata)->cvv); ?></td>
				</tr>
			</tbody>
		</table>
		<h4 class="ui header">Статус</h4>
		<div class="ui divider"></div>
		<form id="order-form" class="ui left floated form">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('PUT')); ?>

			<div class="inline field" id="order-status">
				<?php if($order->status == 3): ?>
					<div class="ui left floated red label">Цуцлагдсан</div>
				<?php else: ?>
					<div class="ui slider checkbox">
						<input type="checkbox" name="active" tabindex="0" class="hidden" <?php echo e($order->status == 2 ? 'checked' : ''); ?>>
						<label class="editable-role"><?php echo e($order->status == 2 ? 'Баталгаажсан' : 'Баталгаажаагүй'); ?></label>
					</div>
					<button id="cancel-btn" type="button" class="ui right floated red button<?php echo e($order->status == 1 ? '' : ' disabled'); ?>">Цуцлах</button>
				<?php endif; ?>
			</div>
		</form><br>
		<div id="message"></div>
	</div>
</div>
<?php if($order->status == 1): ?>
	<div id="cancel-modal" class="ui modal">
		<div class="header">Захиалга цуцлах</div>
		<div class="content">
			<p>Та үүнийг цуцлахыг зөвшөөрч байна уу?</p>
		</div>
		<div class="actions">
			<a class="ui red negative button">Үгүй</a>
			<a class="ui positive right labeled icon button">
				<i class="checkmark icon"></i>Тийм
			</a>
			<form action="" method="POST">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('DELETE')); ?>

			</form>
		</div>
	</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#cancel-btn').click(function(e) {
			$('#cancel-modal').modal({
				onApprove : function() {
					$('#cancel-btn').addClass('loading disabled');
					$('#cancel-modal').find('form').attr('action', '<?php echo e(url("profile/order", $order->id)); ?>');
					$('#cancel-modal').find('form').submit();
				}
			}).modal('show');
			e.preventDefault();
		});
	    $('input[type=checkbox]').change(function() {
	    	$('.checkbox').addClass('disabled');
		    $.ajax({
				type: "POST",
				url: "<?php echo e(url('profile/order', $order->id)); ?>",
		       	data: $('#order-form').serialize(),
		       	success: function(data) {
	    			$('.checkbox').removeClass('disabled');
					$('.editable-role').html(data.status);
					if (data.status == 'Баталгаажсан') {
						$('#cancel-btn').addClass('disabled');
					}
					else if (data.status == 'Баталгаажаагүй') {
						$('#cancel-btn').removeClass('disabled');
					}
					else if (data.status == 'Цуцлагдсан') {
						$('#order-status').html('<div class="ui left floated red label">Цуцлагдсан</div>');
					}
		   		},
				error: function(data){
	    			$('.checkbox').removeClass('disabled');
					var errors = data.responseJSON;
					var errorhtml = '<div class="ui warning message"><ul>';
			        $.each(errors, function( key, value ) {
			            errorhtml += '<li>' + value[0] + '</li>';
			        });
			        errorhtml += '</div></ul>';
		       		$('#message').html(errorhtml);
				}
			});
	    });
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>