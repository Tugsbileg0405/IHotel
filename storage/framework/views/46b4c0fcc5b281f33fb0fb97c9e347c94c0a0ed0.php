<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('hotel.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="twelve wide column">
	<form class="ui form segment" id="create-hotel-service-form" action="<?php echo e(url('hotel/service', $hotel->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
		<h6 class="ui horizontal header divider ihotel-title">Буудлын мэдээлэл</h6>
		<div class="two fields">
			<div class="requried field">
				<label>Хүүхэд авчирч болох эсэх</label>
				<div class="inline fields">
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_child" value="1" class="hidden" <?php echo e($hotel->is_child ? '' : 'checked'); ?> <?php echo e($hotel->is_child == 1 ? 'checked' : ''); ?>>
							<label>Тийм</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_child" value="0" class="hidden" <?php echo e($hotel->is_child == 0 ? 'checked' : ''); ?>>
							<label>Үгүй</label>
						</div>
					</div>
				</div>
			</div>
			<div class="required field">
				<label>Интернет байгаа эсэх</label>
				<div class="inline fields">
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_internet" value="0" class="hidden" <?php echo e($hotel->is_internet ? '' : 'checked'); ?> <?php echo e($hotel->is_internet == 0 ? 'checked' : ''); ?>>
							<label>Үгүй</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_internet" value="1" class="hidden" <?php echo e($hotel->is_internet == 1 ? 'checked' : ''); ?>>
							<label>Тийм, үнэгүй</label>
						</div>
					</div>
					<div class="field">
						<div class="ui radio checkbox">
							<input type="radio" name="is_internet" value="2" class="hidden" <?php echo e($hotel->is_internet == 2 ? 'checked' : ''); ?>>
							<label>Тийм, үнэтэй</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $__currentLoopData = $categories->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorySet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="two fields">
				<?php $__currentLoopData = $categorySet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="field">
						<label><?php echo e($category->name); ?></label>
						<select multiple="" name="services[]" class="ui dropdown">
							<option value="">Сонгох</option>
							<?php $__currentLoopData = $category->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($service->id); ?>"
									<?php echo e($hotel->services->contains($service->id) ? 'selected' : ''); ?>>
									<?php echo e($service->name); ?>

								</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<div class="required field">
			<label>Танилцуулга</label>
			<textarea name="introduction"><?php echo e($hotel->introduction); ?></textarea>
		</div>
		<div class="field">
			<label>Бусад нэмэлт мэдээллүүд</label>
			<textarea name="other_service"><?php echo e($hotel->other_service); ?></textarea>
		</div>
		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="<?php echo e(url('hotel/update', $hotel->id)); ?>">Буцах</a>
			<div class="or"></div>
			<button class="ui primary button" type="submit">
				Дараах<i class="right chevron icon"></i>
			</button>
		</div><br><br>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$('#create-hotel-service-form').form({
	    inline : true,
	    fields: {
	        introduction: {
	            identifier: 'introduction',
	            rules: [
	                {
		                type   : 'empty',
		                prompt : 'Танилцуулга оруулна уу'
	                },
	                {
	                    type   : 'minLength[5]',
	                    prompt : 'Танилцуулга оруулна уу'
	                }
	            ]
	        },
	    },
	    onSuccess: function() {
	    	$(this).find('button').addClass('loading disabled');
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
<?php echo $__env->make('layouts.hotel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>