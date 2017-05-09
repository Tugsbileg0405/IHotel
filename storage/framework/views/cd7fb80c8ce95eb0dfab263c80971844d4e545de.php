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
											<tr>
												<td class="collapsing">
													<h5 class="ui header">Үндсэн зураг</h5>
												</td>
												<td>
													<div class="ui small images">
														<img class="ui rounded image" src="<?php echo e(asset($hotel->cover_photo)); ?>">
													</div>
												</td>
											</tr>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Бусад зураг</h5>
												</td>
												<td>
													<div class="ui small images">
														<?php $__currentLoopData = unserialize($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<img class="ui rounded image" src="<?php echo e(asset($photo)); ?>">
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<a class="ui primary right floated button" href="<?php echo e(url('hotel/photo', $hotel->id)); ?>">Засах</a>
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