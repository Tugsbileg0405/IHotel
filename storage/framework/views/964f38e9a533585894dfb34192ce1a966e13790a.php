<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
	<div class="ui container">
		<div class="ui stackable column grid">
			<div class="six wide column">
				<h3 class="ui header"><?php echo e(__('messages.Order information')); ?></h3>
			</div>
			<div class="right aligned ten wide column">
				<div class="ui breadcrumb">
					<a class="section" href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.Home')); ?></a>
					<span class="divider">/</span>
					<div class="active section"><?php echo e(__('messages.Order information')); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="silver-back">
	<div class="main-page">
		<div class="ui fluid stackable container">
			<div class="ui column grid">
				<div class="sixteen wide column">
					<div class="ui stackable container">
						<div class="ui stackable grid">
							<div class="ui two column row">
								<div class="ten wide column">
									<div class="ui segment">
										<h4 class="ui header"><?php echo e(__('messages.Order information')); ?></h4>
										<div class="ui divided items">
											<div class="item">
												<div class="image">
													<img class="ui top aligned medium image" src="<?php echo e(asset($hotel->cover_photo)); ?>">
												</div>
												<div class="content">
													<h4 class="header">
														<?php if(App::isLocale('mn')): ?> 
															<?php echo e($hotel->name); ?>

														<?php elseif(App::isLocale('en')): ?>
															<?php if($hotel->name_en): ?>
																<?php echo e($hotel->name_en); ?>

															<?php else: ?>
																<?php echo e($hotel->name); ?>

															<?php endif; ?>
														<?php endif; ?>
													</h4>
													<div class="meta">
														<div class="ui header">
															<?php for($i = 0; $i < $hotel->star; $i++): ?>
																<i class='icon yellow star'></i>
															<?php endfor; ?>
														</div>
													</div>
													<div class="meta">
														<div class="ui header">
															<i class="icon location arrow"></i>
															<?php if(App::isLocale('mn')): ?> 
																<?php echo e($hotel->address); ?>

															<?php elseif(App::isLocale('en')): ?>
																<?php if($hotel->address_en): ?>
																	<?php echo e($hotel->address_en); ?>

																<?php else: ?>
																	<?php echo e($hotel->address); ?>

																<?php endif; ?>
															<?php endif; ?>
														</div>
													</div>
													<div class="meta">
												 		<div class="ui header">
															<i class="icon phone"></i>
															<?php echo e($hotel->phone_number); ?>

														</div>
													</div>
													<?php if($hotel->website): ?>
														<div class="meta">
															<div class="ui header">
																<i class="icon world"></i>
																<?php echo e($hotel->website); ?>

															</div>
														</div>
													<?php endif; ?>
													<div class="extra">
														<div class="ui label"> <?php echo e(__('messages.Check-in')); ?>: <?php echo e($startdate); ?></div>
														<div class="ui label"> <?php echo e(__('messages.Check-out')); ?>: <?php echo e($enddate); ?></div>
													</div>
												</div>
											</div>
											<h4 class="header"><?php echo e(__('messages.Ordered rooms')); ?></h4>
											<table class="ui celled table">
												<thead>
													<tr>
														<th><?php echo e(__('messages.Room name')); ?></th>
														<th><?php echo e(__('messages.Rooms')); ?></th>
														<th><?php echo e(__('messages.Cost of per night')); ?></th>
														<th><?php echo e(__('messages.Day')); ?></th>
														<th><?php echo e(__('messages.Total')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td><?php echo e($room->name); ?></td>
															<td><?php echo e($room->ordered_number); ?></td>
															<?php if(App::isLocale('mn')): ?> 
																<?php if($room->saled_room): ?>
																	<td><?php echo e(number_format($room->saled_room->price)); ?> ₮</td>
																<?php else: ?>
																	<td><?php echo e(number_format($room->price)); ?> ₮</td>
																<?php endif; ?>
															<?php elseif(App::isLocale('en')): ?>
																<?php if($room->saled_room): ?>
																	<td><?php echo e(number_format($room->saled_room->price/$rate,2)); ?> ₮</td>
																<?php else: ?>
																	<td><?php echo e(number_format($room->price/$rate,2)); ?> $</td>
																<?php endif; ?>
															<?php endif; ?>
															<td><?php echo e($orderday); ?></td>
															<?php if(App::isLocale('mn')): ?> 
																<?php if($room->saled_room): ?>
																	<td><?php echo e(number_format($room->saled_room->price * $room->ordered_number * $orderday)); ?> ₮</td>
																<?php else: ?>
																	<td><?php echo e(number_format($room->price * $room->ordered_number * $orderday)); ?> ₮</td>
																<?php endif; ?>
															<?php elseif(App::isLocale('en')): ?>
																<?php if($room->saled_room): ?>
																	<td><?php echo e(number_format($room->saled_room->price * $room->ordered_number * $orderday/$rate,2)); ?> $</td>
																<?php else: ?>
																	<td><?php echo e(number_format($room->price * $room->ordered_number * $orderday/$rate,2)); ?> $</td>
																<?php endif; ?>
															<?php endif; ?>
														</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php if($pickup): ?>
														<tr>
															<td colspan="2"><?php echo e(__('messages.Pickup service')); ?></td>
															<?php if(App::isLocale('mn')): ?>
																<td colspan="3"><?php echo e($pickup->name); ?> - <?php echo e(number_format($pickup->price)); ?>₮</td>
															<?php elseif(App::isLocale('en')): ?>
																<td colspan="3"><?php echo e($pickup->name_en); ?> - <?php echo e(number_format($pickup->price/$rate,2)); ?>$</td>
															<?php endif; ?>
														</tr>
													<?php endif; ?>
													<!--<tr>
														<td colspan="2"><?php echo e(__('messages.Price before tax')); ?> (<?php echo e(__('messages.Tax')); ?> 10%)</td>
														<?php if(App::isLocale('mn')): ?> 
															<td colspan="3"><?php echo e(number_format($price)); ?> ₮ (<?php echo e(number_format($price*0.1)); ?> ₮)</td>
														<?php elseif(App::isLocale('en')): ?>
															<td colspan="3"><?php echo e(number_format($price/$rate,2)); ?> $ (<?php echo e(number_format($price*0.1/$rate,2)); ?> $)</td>
														<?php endif; ?>
													</tr>-->
													<tr>
														<td colspan="2"><?php echo e(__('messages.Price after tax')); ?></td>
														<?php if(App::isLocale('mn')): ?> 
															<td colspan="3"><?php echo e(number_format($price)); ?> ₮</td>
														<?php elseif(App::isLocale('en')): ?>
															<td colspan="3"><?php echo e(number_format($price/$rate,2)); ?> $</td>
														<?php endif; ?>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="six wide column">
									<div class="ui segment">
										<form class="ui form">
											<?php echo e(csrf_field()); ?>

											<h4 class="ui header"><?php echo e(__('messages.Credit card information')); ?></h4>
											<div class="ui divider"></div>
											<div class="sixteen wide field">
												<div class="field">
													<label>Нийт дүн / Total Price</label>
													<?php if(App::isLocale('mn')): ?> 
														<input type="text" name="total" value="<?php echo e(number_format($price)); ?> ₮" disabled="">
														<input type="hidden" name="price" value="<?php echo e(number_format($price)); ?>">
													<?php elseif(App::isLocale('en')): ?>
														<input type="text" name="total" value="<?php echo e(number_format($price/$rate,2)); ?> $" disabled="">
														<input type="hidden" name="price" value="<?php echo e(number_format($price/$rate,2)); ?>">
													<?php endif; ?>
												</div>
											</div>
										</form><br>
										<form id="card-form" action="<?php echo e(url('order/card/store')); ?>" method="POST" >
											<?php echo e(csrf_field()); ?>

											<div class="card-js" id="my-card" data-capture-name="true"  data-icon-colour="#158CBA">>
												<input class="card-number my-custom-class" data-rule-required="true" name="card_number">
												<input class="name" id="the-card-name-id" data-rule-required="true" name="card_holders_name" placeholder="Name on card">
												<input class="expiry-month" data-rule-required="true" name="expiry_month">
												<input class="expiry-year" data-rule-required="true" name="expiry_year">
												<input class="cvc" data-rule-required="true" name="cvc">
											</div><br>
											<div class="ui checkbox">
												<input type="checkbox" name="terms" id="terms">
												<?php if(App::isLocale('mn')): ?> 
													<label><a href="<?php echo e(url('/terms')); ?>" onClick="check()" target="_blank">Үйлчилгээний нөхцөл</a> зөвшөөрөх</label>
												<?php elseif(App::isLocale('en')): ?> 
													<label>I agree to<a href="<?php echo e(url('/terms')); ?>" onClick="check()" target="_blank"> terms and condition</a></label>
												<?php endif; ?>
											</div>
											<div class="sixteen wide field">
												<span class="error-msg"></span><br>
											</div>
											<input type="hidden" class="expired_year" name="expired_year">
											<input type="hidden" class="expired_month" name="expired_month">
											<button type="submit" id="submitOrder" class="ui primary fluid submit button"><?php echo e(__('messages.Order')); ?></button>
										</form>
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

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/card-js.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.creditCardValidator.js')); ?>"></script>
<script type="text/javascript">
	$("#card-form").validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",
		messages: {
			card_number: {
				required: '*<?php echo e(__("form.Please enter a value")); ?>'
			},
			card_holders_name: {
				required: '*<?php echo e(__("form.Please enter a value")); ?>'
			},
			expiry_month: {
				required: '*<?php echo e(__("form.Please enter a value")); ?>'
			},
			expiry_year: {
				required: '*<?php echo e(__("form.Please enter a value")); ?>'
			},
			cvc: {
				required: '*<?php echo e(__("form.Please enter a value")); ?>'
			},
		},
		submitHandler: function(form) {
			$('#submitOrder').addClass('loading disabled');
			$('.my-custom-class').validateCreditCard(function(result) {
				var myCard = $('#my-card');
				var expiryMonth = myCard.CardJs('expiryMonth');
				var expiryYear = myCard.CardJs('expiryYear');
				var valid = CardJs.isExpiryValid(expiryMonth, expiryYear);
				if(result.valid == false){
					$('#submitOrder').removeClass('loading disabled');
					$('.error-msg').html('*<?php echo e(__("form.Card number is wrong")); ?>');
				}
				else if(valid == false){
					$('#submitOrder').removeClass('loading disabled');
					$('.error-msg').html('*<?php echo e(__("form.Please enter a valid expiry date")); ?>');
				}
				else {
					$('.error-msg').html('');
					$('.expired_year').val(expiryYear);
					$('.expired_month').val(expiryMonth);
					form.submit();
				}
			});
		}
	});
	if($('#terms').is(':checked')){
		$('#submitOrder').removeClass('disabled');
	}else{
		$('#submitOrder').addClass('disabled');
	}
	$('#terms').change(function() {
		if($(this).is(":checked")) {
			$('#submitOrder').removeClass('disabled');
		}else{
			$('#submitOrder').addClass('disabled');
		}
	});
	function check(){
		$("#terms").prop('checked', true);
		$('#submitOrder').removeClass('disabled');
	}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>