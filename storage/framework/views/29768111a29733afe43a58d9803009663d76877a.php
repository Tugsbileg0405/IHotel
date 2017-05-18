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
													<h5 class="ui header">Хүүхэд авчирч болох эсэх</h5>
												</td>
												<td><?php echo e($hotel->is_child == 0 ? 'Үгүй' : 'Тийм'); ?></td>
											</tr>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Интернет байгаа эсэх</h5>
												</td>
												<td>
													<?php echo e($hotel->is_internet == 0 ? 'Үгүй' : ''); ?>

													<?php echo e($hotel->is_internet == 1 ? 'Тийм, үнэгүй' : ''); ?>

													<?php echo e($hotel->is_internet == 2 ? 'Тийм, үнэтэй' : ''); ?>

												</td>
											</tr>
											<tr>
												<td class="collapsing">
													<h5 class="ui header">Танилцуулга</h5>
												</td>
												<td><?php echo $hotel->introduction; ?></td>
											</tr>
											<?php if($hotel->other_service): ?>
												<tr class="ihotel-blue">
													<td class="collapsing">
														<h5 class="ui header">Бусад нэмэлт мэдээлэл</h5>
													</td>
													<td><?php echo $hotel->other_service; ?></td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
									<a class="ui primary right floated button" href="<?php echo e(url('hotel/service', $hotel->id)); ?>">Засах</a>
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