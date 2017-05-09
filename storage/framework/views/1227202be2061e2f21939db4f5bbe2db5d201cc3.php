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

										<h4 class="ui header">Захиалгын мэдээлэл</h4>
									</div>
								</div>
							</div>
							<div class="ui stackable grid">
								<div class="sixteen wide column">
									<div class="ui segment">
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
												<?php if(unserialize($order->pickup)): ?>
													<tr>
														<td>Онгоцны буудлаас тосох</td>
														<td><?php echo e(unserialize($order->pickup)['name']); ?></td>
													</tr>
												<?php endif; ?>
												<tr>
													<td>Хоног</td>
													<td><?php echo e($order->day); ?></td>
												</tr>
												<tr>
													<td>Нийт үнэ</td>
													<td>
														<?php if($order->price_dollar): ?>
															<?php echo e(number_format($order->price_dollar)); ?>$
														<?php else: ?>
															<?php echo e(number_format($order->price)); ?>₮
														<?php endif; ?>
													</td>
												</tr>
												<tr>
													<td>Төлөв</td>
													<td>
														<?php if($order->status == 1): ?>
															<span class="ui teal label">Баталгаажаагүй</span>
														<?php elseif($order->status == 2): ?>
															<span class="ui green label">Баталгаажсан</span>
														<?php elseif($order->status == 3): ?>
															<span class="ui red label">Цуцлагдсан</span>
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
												<?php $__currentLoopData = unserialize($order->rooms); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($room['room_name']); ?></td>
														<td><?php echo e($room['room_number']); ?></td>
														<?php if($order->price_dollar): ?>
															<td><?php echo e(number_format($room['room_price'])); ?>$</td>
														<?php else: ?>
															<td><?php echo e(number_format($room['room_price'])); ?>₮</td>
														<?php endif; ?>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hoteladmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>