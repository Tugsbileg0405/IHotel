<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="six wide column">
	<form class="ui form segment" id="rate-form">
		<?php echo e(csrf_field()); ?>

		<table class="ui very basic celled table">
			<thead>
				<tr>
					<th>
						<?php if(App::isLocale('en')): ?>
							<?php if($hotel->name_en): ?>
								<?php echo e($hotel->name_en); ?>

							<?php else: ?>
								<?php echo e($hotel->name); ?>

							<?php endif; ?>
						<?php elseif(App::isLocale('mn')): ?>
							<?php echo e($hotel->name); ?>

						<?php endif; ?>
					</th>
					<th><?php echo e(__('messages.Give a rating')); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header"><?php echo e(__('messages.Hotel employees')); ?></div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="employees">
								<option value=""><?php echo e(__('messages.Choose a score')); ?>!</option>
								<?php for($i=1; $i<=10; $i++): ?>
									<option value="<?php echo e($i); ?>"
										<?php if($rate): ?>
											<?php echo e($rate->employees == $i ? 'selected' : ''); ?>

										<?php endif; ?>
									><?php echo e($i); ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header"><?php echo e(__('messages.Room clarity')); ?></div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="fresh">
								<option value=""><?php echo e(__('messages.Choose a score')); ?>!</option>
								<?php for($i=1; $i<=10; $i++): ?>
									<option value="<?php echo e($i); ?>"
										<?php if($rate): ?>
											<?php echo e($rate->fresh == $i ? 'selected' : ''); ?>

										<?php endif; ?>
									><?php echo e($i); ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header"><?php echo e(__('messages.Comfortable')); ?></div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="comfort">
								<option value=""><?php echo e(__('messages.Choose a score')); ?>!</option>
								<?php for($i=1; $i<=10; $i++): ?>
									<option value="<?php echo e($i); ?>"
										<?php if($rate): ?>
											<?php echo e($rate->comfort == $i ? 'selected' : ''); ?>

										<?php endif; ?>
									><?php echo e($i); ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header"><?php echo e(__('messages.Location')); ?></div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="location">
								<option value=""><?php echo e(__('messages.Choose a score')); ?>!</option>
								<?php for($i=1; $i<=10; $i++): ?>
									<option value="<?php echo e($i); ?>"
										<?php if($rate): ?>
											<?php echo e($rate->location == $i ? 'selected' : ''); ?>

										<?php endif; ?>
									><?php echo e($i); ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<h4 class="ui image header">
							<div class="content">
								<div class="sub header"><?php echo e(__('messages.Room price')); ?></div>
							</div>
						</h4>
					</td>
					<td>
						<div class="field">
							<select class="ui dropdown" name="price">
								<option value=""><?php echo e(__('messages.Choose a score')); ?>!</option>
								<?php for($i=1; $i<=10; $i++): ?>
									<option value="<?php echo e($i); ?>"
										<?php if($rate): ?>
											<?php echo e($rate->price == $i ? 'selected' : ''); ?>

										<?php endif; ?>
									><?php echo e($i); ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<button class="ui right floated primary button" type="submit"><?php echo e(__('messages.Send')); ?></button>
		<br><br><br>
	</form>
</div>
<div class="five wide column">
	<form class="ui form segment" id="review-form">
		<?php echo e(csrf_field()); ?>

		<h4 class="ui header"><?php echo e(__('messages.Write a comment')); ?></h4>
		<div class="field">
			<textarea name="content" rows="3"><?php echo e($review ? $review->content : ''); ?></textarea>
		</div>
		<button class="ui right floated primary button" type="submit"><?php echo e(__('messages.Send')); ?></button>
		<br><br><br>
	</form>
</div>
<div class="ui basic modal" id="success-message">
	<div class="ui icon header">
		<i class="green check icon"></i>
		<?php echo e(__('messages.Successfully sent')); ?>

	</div>
</div>
<div class="ui basic modal" id="error-message">
	<div class="ui icon header">
		<i class="red close icon"></i>
		<?php echo e(__('messages.Error occured')); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $('#rate-form').submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        fields: {
            employees: {
                identifier: 'employees',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '<?php echo e(__("form.Please select a score")); ?>'
	                }
                ]
            },
            fresh: {
                identifier: 'fresh',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '<?php echo e(__("form.Please select a score")); ?>'
	                }
                ]
            },
            comfort: {
                identifier: 'comfort',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '<?php echo e(__("form.Please select a score")); ?>'
	                }
                ]
            },
            location: {
                identifier: 'location',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '<?php echo e(__("form.Please select a score")); ?>'
	                }
                ]
            },
            price: {
                identifier: 'price',
                rules: [
	                {
	                    type: 'empty',
                        prompt : '<?php echo e(__("form.Please select a score")); ?>'
	                }
                ]
            },
        },
        onSuccess: function() {
            $('#rate-form button').addClass('loading disabled');
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("profile/rate", $hotel->id)); ?>',
                data: $('#rate-form').serialize(),
                success: function() {
                    $('#rate-form button').removeClass('loading disabled');
                    $('#success-message').modal('show');
                },
                error: function(){
                    $('#rate-form button').removeClass('loading disabled');
                    $('#error-message').modal('show');
                }
            });
        }
    });
    $('#review-form').submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        fields: {
            content: {
                identifier: 'content',
                rules: [{
                    type: 'empty',
                    prompt: 'Сэтгэгдэл оруулна уу'
                }]
            },
        },
        onSuccess: function() {
            $('#review-form button').addClass('loading disabled');
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url('profile/review', $hotel->id)); ?>',
                data: $('#review-form').serialize(),
                success: function() {
                    $('#review-form button').removeClass('loading disabled');
                    $('#success-message').modal('show');
                },
                error: function(){
                    $('#review-form button').removeClass('loading disabled');
                    $('#error-message').modal('show');
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>