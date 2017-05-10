<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('profile.hotel.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-page">
	<div class="admin-header">
		<div class="admin-body">
			<div class="ui fluid stackable container">
				<div class="ui stackable column grid">
					<div class="sixteen wide column">
						<div id="context1">
							<?php echo $__env->make('profile.hotel.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<div class="ui segment com-service">
								<div class="ui stackable grid search-form">
									<div class="eight wide column"><?php echo e(date('Y-m-d')); ?>

										<h4 class="ui header">Буудлын мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="three wide column">
									<?php echo $__env->make('profile.hotel.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
								<div class="thirteen wide column">
									<table class="ui selectable table">
										<tbody>
											<?php if($hotel->payment): ?>
												<tr>
													<td class="collapsing">
														<h5 class="ui header">Төлбөрийн нөхцөл</h5>
													</td>
													<td>
														<div class="ui tiny images">
															<?php $__currentLoopData = unserialize($hotel->payment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<?php if($payment == 1): ?>
																	<img class="ui image" src="<?php echo e(asset('img/card1.svg')); ?>">
																<?php endif; ?>
																<?php if($payment == 2): ?>
																	<img class="ui image" src="<?php echo e(asset('img/card2.svg')); ?>">
																<?php endif; ?>
																<?php if($payment == 3): ?>
																	<img class="ui image" src="<?php echo e(asset('img/card3.svg')); ?>">
																<?php endif; ?>
																<?php if($payment == 4): ?>
																	<img class="ui image" src="<?php echo e(asset('img/card4.svg')); ?>">
																<?php endif; ?>
																<?php if($payment == 5): ?>
																	<img class="ui image" src="<?php echo e(asset('img/card5.svg')); ?>">
																<?php endif; ?>
																<?php if($payment == 6): ?>
																	<img class="ui image" src="<?php echo e(asset('img/card6.svg')); ?>">
																<?php endif; ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</div>
													</td>
												</tr>
											<?php endif; ?>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Захиалга цуцлах нөхцөл</h5>
												</td>
												<td>
													<?php echo e($hotel->co_day); ?> өдрийн өмнө цуцлаагүй бол <?php echo e($hotel->co_payment); ?> төлнө.
												</td>
											</tr>
										</tbody>
									</table>
									<a class="ui primary right floated button" href="<?php echo e(url('hotel/payment', $hotel->id)); ?>">Засах</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(session()->has('status')): ?>
	<div class="ui basic modal" id="success-message">
		<div class="ui icon header">
			<i class="green check icon"></i>
			<?php echo e(session('status')); ?>

		</div>
	</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#success-message').modal('show');
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hoteladmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>