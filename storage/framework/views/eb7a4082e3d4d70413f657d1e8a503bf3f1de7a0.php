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
									<div class="four wide column"><?php echo e(date('Y-m-d')); ?>

										<h4 class="ui header">Үйлчлүүлэгчдийн сэтгэгдэл</h4>
									</div>
									<div class="eight wide column">
										<h4 class="ui left floated header">Зочид буудлын оноо - Нийт <label class="com-label">10</label> онооноос <label class="com-label"><?php echo e($total); ?></label> байна.
										</h4>
									</div>
								</div>
							</div>
							<div class="sixteen wide column">
								<div class="ui segment">
									<?php if($rates->count() > 0): ?>
										<div class="ui middle aligned divided list">
											<table class="ui very basic table">
												<tbody>
													<tr>
														<td class="collapsing"><h5 class="ui header">Буудлын ажилчид</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="<?php echo e($employees); ?>" data-total="10" id="example1">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Өрөөний цэвэр ахуй</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="<?php echo e($fresh); ?>" data-total="10" id="example3">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Тав тух</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="<?php echo e($comfort); ?>" data-total="10" id="example4">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Байршил</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="<?php echo e($location); ?>" data-total="10" id="example5">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="collapsing"><h5 class="ui header">Өрөөний үнэ</h5></td>
														<td>
															<div class="ui small yellow progress" data-value="<?php echo e($price); ?>" data-total="10" id="example6">
																<div class="bar">
																	<div class="progress"></div>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									<?php else: ?>
										Оноо өгсөн хэрэглэгч олдсонгүй.
									<?php endif; ?>
								</div>
							</div><br>
							<div class="ui stackable grid">
								<?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="eight wide column">
										<div class="ui segment user-comment">
											<?php echo e(date('Y-m-d', strtotime($rate->created_at))); ?>

											<div class="ui clearing">
												<h4 class="ui left floated header">
												<img class="ui avatar image" src="<?php echo e(asset($rate->user->avatar)); ?>"><?php echo e($rate->user->name); ?>

												</h4>
												<h2 class="ui right floated header">
													<?php echo e(($rate->employees + $rate->fresh + $rate->comfort + $rate->location + $rate->price) / 5); ?>

												</h2>
											</div>
											<div class="ui middle aligned divided list">
												<table class="ui very basic table">
													<tbody>
														<tr>
															<td class="collapsing"><h5 class="ui header">Буудлын ажилчид</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="<?php echo e($rate->employees); ?>" data-total="10" id="example1">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing"><h5 class="ui header">Өрөөний цэвэр ахуй</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="<?php echo e($rate->fresh); ?>" data-total="10" id="example3">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing"><h5 class="ui header">Тав тух</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="<?php echo e($rate->comfort); ?>" data-total="10" id="example4">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing"><h5 class="ui header">Байршил</h5></td>
															<td>
																<div class="ui small yellow progress" data-value="<?php echo e($rate->location); ?>" data-total="10" id="example5">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td class="collapsing">
																<h5 class="ui header">Өрөөний үнэ</h5>
															</td>
															<td>
																<div class="ui small yellow progress" data-value="<?php echo e($rate->price); ?>" data-total="10" id="example6">
																	<div class="bar">
																		<div class="progress"></div>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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