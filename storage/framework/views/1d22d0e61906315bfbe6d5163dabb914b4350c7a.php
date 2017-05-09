<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<?php if($orders->count() > 0): ?>
		<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="ui segment">					 
				<div class="ui divided items">
					<div class="item">
						<div class="image">
							<img class="ui top aligned medium image" src="<?php echo e(asset($order->hotel->cover_photo)); ?>">
						</div>
						<div class="content">
							<h4 class="header">
								<?php if(App::isLocale('en')): ?>
									<?php if($order->hotel->name_en): ?>
										<?php echo e($order->hotel->name_en); ?>

									<?php else: ?>
										<?php echo e($order->hotel->name); ?>

									<?php endif; ?>
								<?php elseif(App::isLocale('mn')): ?>
									<?php echo e($order->hotel->name); ?>

								<?php endif; ?>
							</h4>
							<div class="meta">
								<div class="ui blue header">
									<i class="icon check"></i>
									<?php echo e(__('messages.The order number')); ?> - <?php echo e($order->id); ?>

								</div>
							</div>
							<div class="extra">
								<div class="ui label"><?php echo e(__('messages.Check-in')); ?> - <?php echo e($order->startdate); ?></div>
								<div class="ui label"><?php echo e(__('messages.Check-out')); ?> - <?php echo e($order->enddate); ?></div>
							</div>
							<div class="extra">
								<?php if($order->status == 1): ?>
									<div class="ui left floated teal label">Шалгаж байна</div>
									<button class="ui primary right floated button open-CancelModal" data-id="<?php echo e($order->id); ?>"><?php echo e(__('messages.Cancel')); ?></button>
								<?php elseif($order->status == 2): ?>
									<div class="ui left floated green label">Баталгаажсан</div>
								<?php elseif($order->status == 3): ?>
									<div class="ui left floated red label">Цуцлагдсан</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($orders->links()); ?>

	<?php else: ?>
		<div class="ui segment">Та одоогоор захиалга хийгээгүй байна</div>
	<?php endif; ?>
</div>
<div id="cancel-modal" class="ui modal">
	<div class="header">Захиалга цуцлах</div>
	<div class="content">
		<p>Та захиалга цуцлахыг зөвшөөрч байна уу?</p>
	</div>
	<div class="actions">
		<a class="ui red negative button">Үгүй</a>
		<a class="ui positive right labeled icon button">
			<i class="checkmark icon"></i>Тийм
		</a>
		<form action="" method="POST">
			<?php echo e(csrf_field()); ?>

		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $('.open-CancelModal').click(function() {
    	var button = $(this);
		var id = $(this).data('id');
		$('#cancel-modal').modal({
			onApprove : function() {
				button.addClass('loading disabled');
				$('#cancel-modal').find('form').attr('action', "<?php echo e(url('profile/orders/cancel')); ?>/" + id);
				$('#cancel-modal').find('form').submit();
			}
		}).modal('show');
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>