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
															<i class="icon marker"></i>
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
														<th><?php echo e(__('messages.Price')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td><?php echo e($room->name); ?></td>
															<td><?php echo e($room->ordered_number); ?></td>
															<?php if(App::isLocale('mn')): ?> 
																<td><?php echo e(number_format($room->price)); ?>₮</td>
															<?php elseif(App::isLocale('en')): ?>
																<td>$<?php echo e(number_format($room->price/$rate,2)); ?></td>
															<?php endif; ?>
															<td><?php echo e($orderday); ?></td>
															<?php if(App::isLocale('mn')): ?> 
																<td><?php echo e(number_format($room->price * $room->ordered_number * $orderday)); ?>₮</td>
															<?php elseif(App::isLocale('en')): ?>
																<td>$<?php echo e(number_format($room->price * $room->ordered_number * $orderday/$rate,2)); ?></td>
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
														<td colspan="2"><?php echo e(__('messages.Total price')); ?></td>
														<?php if(App::isLocale('mn')): ?> 
															<td colspan="3"><?php echo e(number_format($price)); ?> ₮</td>
														<?php elseif(App::isLocale('en')): ?>
															<td colspan="3"><?php echo e(number_format($price/$rate,2)); ?> $</td>
														<?php endif; ?>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="ui message">
											<ul class="list">
												<li>10% VAT is included</li>
												<li>5% Property service charge is included.</li>
												<li>1% City tax is included</li>
												<li>Prepayment: Payment will be withdrawn any time after booking..</li>
												<li>Cancellation cost: No cancellation</li>
											</ul>
										</div>
				                        <div class="ui divider"></div>
										<div class="ui form">
											<h4 class="ui header"><?php echo e(__('messages.Special requests')); ?></h4>
											<div class="field">
												<label><?php echo e(__('messages.Please write your requests in English')); ?></label>
												<textarea id="request"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="six wide column">
									<div class="ui segment">
										<form id="card-form" class="ui form" action="<?php echo e(url('order/card/store')); ?>" method="POST">
											<?php echo e(csrf_field()); ?>

											<h4 class="ui header"><?php echo e(__('messages.Personal information')); ?></h4>
											<div class="ui divider"></div>
											<div class="two fields">
												<div class="required field">
													<label><?php echo e(__('messages.Name')); ?></label>
													<input type="text" name="name" placeholder="<?php echo e(__('messages.Name')); ?>" value="<?php echo e(Auth::user()->name); ?>">
												</div>
												<div class="required field">
													<label><?php echo e(__('messages.Surname')); ?></label>
													<input type="text" name="surname" placeholder="<?php echo e(__('messages.Surname')); ?>" value="<?php echo e(Auth::user()->surname); ?>">
												</div>
											</div>
											<div class="two fields">
												<div class="required field">
													<label><?php echo e(__('messages.Country')); ?></label>
													<select class="ui fluid dropdown" name="country">
															<option value=""><?php echo e(__('messages.Country')); ?></option>
															<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($country); ?>" <?php echo e(Auth::user()->country == $country ? 'selected' : ''); ?>><?php echo e($country); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
												<div class="required field">
													<label><?php echo e(__('messages.Phone')); ?></label>
													<input type="text" name="phone_number" placeholder="<?php echo e(__('messages.Phone')); ?>" value="<?php echo e(Auth::user()->phone_number); ?>">
												</div>
											</div>
											<h4 class="ui header"><?php echo e(__('messages.Credit card information')); ?></h4>
											<div class="ui divider"></div>
											<div class="field">
												<label><?php echo e(__('messages.Total price')); ?></label>
												<?php if(App::isLocale('mn')): ?> 
													<input type="text" name="total" value="<?php echo e(number_format($price)); ?> ₮" disabled="">
												<?php elseif(App::isLocale('en')): ?>
													<input type="text" name="total" value="<?php echo e(number_format($price/$rate,2)); ?> $" disabled="">
												<?php endif; ?>
											</div>
											<div class="field">
												<div class="ui left icon input">
													<input type="tel" name="card_number" placeholder="Card number" maxlength="19">
													<i class="blue credit card alternative icon"></i>
												</div>
											</div>
											<div class="field">
												<div class="ui left icon input">
													<input type="text" name="card_holders_name" placeholder="Name on card">
													<i class="blue user icon"></i>
												</div>
											</div>
											<div class="two fields">
												<div class="field">
													<div class="ui left icon input">
														<input type="text" name="expired_month" placeholder="MM" maxlength="2">
														<i class="blue calendar icon"></i>
													</div>
												</div>
												<div class="field">
													<div class="ui left icon input">
														<input type="text" name="expired_year" placeholder="YY" maxlength="2">
														<i class="blue calendar icon"></i>
													</div>
												</div>
											</div>
											<div class="field">
												<div class="ui left icon input">
													<input type="text" name="cvc" placeholder="CVC" maxlength="4">
													<i class="blue lock icon"></i>
												</div>
											</div>
											<div class="field">
												<div class="ui checkbox">
													<input type="checkbox" name="terms">
													<?php if(App::isLocale('mn')): ?> 
														<label><a href="<?php echo e(url('/terms')); ?>" onClick="check()" target="_blank">Үйлчилгээний нөхцөл</a> зөвшөөрөх</label>
													<?php elseif(App::isLocale('en')): ?> 
														<label>I agree to<a href="<?php echo e(url('/terms')); ?>" onClick="check()" target="_blank"> terms and condition</a></label>
													<?php endif; ?>
												</div>
											</div>
											<input type="hidden" name="request">
											<button type="submit" class="ui primary fluid button"><?php echo e(__('messages.Order')); ?></button>
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
<script type="text/javascript">
	$.fn.form.settings.rules.month = function(value) {
		var year = $('[name="expired_year"]').val();
		if (year == '<?php echo e(date("y")); ?>') {
			if (value >= '<?php echo e(date("m")); ?>' && value <= 12) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			if (value >= 1 && value <= 12) {
				return true;
			}
			else {
				return false;
			}
		}
	}
    $('#card-form').form({
        inline : true,
        fields: {
            name: {
                identifier: 'name',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter your name")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            surname: {
                identifier: 'surname',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter your surname")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            country: {
                identifier: 'country',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please select a country")); ?>'
                    }
                ]
            },
            phone_number: {
            	identifier: 'phone_number',
            	rules: [
            		{
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter a phone number")); ?>'
            		}
            	]
            },
            terms: {
                identifier: 'terms',
                rules: [
                    {
                        type   : 'checked',
                        prompt : '<?php echo e(__("form.Please agree terms of service")); ?>'
                    }
                ]
            },
            card_number: {
            	identifier: 'card_number',
            	rules: [
            		{
            			type   : 'creditCard',
            			prompt : '<?php echo e(__("form.Card number is wrong")); ?>'
            		}
            	]
            },
            card_holders_name: {
                identifier: 'card_holders_name',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter a value")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            expired_month: {
                identifier: 'expired_month',
                rules: [
                    {
                        type   : 'month',
                        prompt : '<?php echo e(__("form.Please enter a valid expiry date")); ?>',
                    },
                    {
                        type   : 'exactLength[2]',
                        prompt : '<?php echo e(__("form.Please enter a valid expiry date")); ?>'
                    },
                ]
            },
            expired_year: {
                identifier: 'expired_year',
                rules: [
                    {
                        type   : 'integer[<?php echo e(date("y")); ?>..99]',
                        prompt : '<?php echo e(__("form.Please enter a valid expiry date")); ?>'
                    },
                    {
                        type   : 'exactLength[2]',
                        prompt : '<?php echo e(__("form.Please enter a valid expiry date")); ?>'
                    },
                ]
            },
            cvc: {
                identifier: 'cvc',
                rules: [
                    {
                        type   : 'number',
                        prompt : '<?php echo e(__("form.Please enter a valid CVC")); ?>'
                    },
                    {
                        type   : 'minLength[3]',
                        prompt : '<?php echo e(__("form.Please enter a valid CVC")); ?>'
                    },
                    {
                        type   : 'maxLength[4]',
                        prompt : '<?php echo e(__("form.Please enter a valid CVC")); ?>'
                    },
                ]
            },
        },
        onSuccess: function() {
        	var value = $('#request').val();
        	$('#card-form').find('[name=request]').val(value);
			$('#card-form').find('button[type=submit]').addClass('loading disabled');
        },
		onFailure: function(formErrors, fields) {
			var element;
			$.each(fields, function(e) {
				element = $('[name=' + e + ']');
				if(element.closest('.field').hasClass('error')) {
					if (element.parent().hasClass('dropdown')) {
						$(window).scrollTop(element.parent().offset().top - $(window).height() / 2);
					}
					else {
						element.focus();
					}
					return false;
				}
			});
			return false;
		},
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>