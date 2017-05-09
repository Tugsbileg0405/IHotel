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
													<h5 class="ui header">Буудлын нэр</h5>
												</td>
												<td><?php echo e($hotel->name); ?></td>
											</tr>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Зочид буудын төрөл</h5>
												</td>
												<td><?php echo e($hotel->category->name); ?></td>
											</tr>
											<tr>
												<td class="collapsing">
													<h5 class="ui header">Одны зэрэглэл</h5>
												</td>
												<td>
													<?php for($i=0; $i<$hotel->star; $i++): ?>
														<i class="yellow star icon"></i>
													<?php endfor; ?>
												</td>
											</tr>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Өрөөний тоо</h5>
												</td>
												<td><?php echo e($hotel->room_number); ?></td>
											</tr>
											<?php if($hotel->website): ?>
												<tr>
													<td class="collapsing">
														<h5 class="ui header">Цахим хуудас</h5>
													</td>
													<td><?php echo e($hotel->website); ?></td>
												</tr>
											<?php endif; ?>
											<tr class="ihotel-blue">
												<td class="collapsing">
													<h5 class="ui header">Холбоо барих ажилтны нэр</h5>
												</td>
												<td><?php echo e($hotel->contact); ?></td>
											</tr>
											<tr>
												<td class="collapsing">
													<h5 class="ui header">Утас</h5>
												</td>
												<td><?php echo e($hotel->phone_number); ?></td>
											</tr>
										</tbody>
									</table>
									<a class="ui primary right floated button" href="<?php echo e(url('hotel/update', $hotel->id)); ?>">Засах</a>
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