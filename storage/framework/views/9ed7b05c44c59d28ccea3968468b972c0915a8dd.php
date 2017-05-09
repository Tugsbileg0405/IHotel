<?php $__env->startSection('title', 'Захиалга'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-page">
	<div class="ui segment com-service">
		<div class="ui container">
			<div class="ui stackable grid">
				<div class="eight wide column"><?php echo e(date('Y-m-d')); ?>

					<h4 class="ui header">Захиалгын мэдээлэл</h4>
				</div>
			</div>
		</div>
	</div>
    <div class="ui container">
		<div class="ui green segment">
			<h4 class="ui header">Захиалга</h4>
			<div class="ui divider"></div>
		    <form id="search-form" class="ui form" action="<?php echo e(url('profile/order/search')); ?>" method="POST">
	    		<?php echo e(csrf_field()); ?>

				<div class="field">
					<div class="ui fluid left icon input">
						<input type="text" name="search" placeholder="Захиалгын дугаар, Захиалагчийн нэр, Захиалагчийн и-мэйл, Буудлын нэр">
						<i class="search icon"></i>
					</div>
					<div class="results"></div>
				</div>
				<button class="ui red right floated button">Хайх</button>
			</form><br><br><br>
			<div id="result">
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

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $('#search-form').submit(function(e) {
		$('#search-form button').addClass('loading disabled');
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
        }).done(function(data) {
			$('#search-form button').removeClass('loading disabled');
            $('#result').html(data);
        }).fail(function() {
			$('#search-form button').removeClass('loading disabled');
            $('#result').html('<div class="ui warning message">Алдаа гарлаа</div>');
        });
        e.preventDefault(); 
    });
	$('.open-DeleteModal').click(function() {
		var id = $(this).data('id');
		$('#delete-modal').modal({
			onApprove : function() {
				$('#delete-modal').find('form').attr('action', "<?php echo e(url('profile/order')); ?>/" + id);
				$('#delete-modal').find('form').submit();
			}
		}).modal('show');
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>