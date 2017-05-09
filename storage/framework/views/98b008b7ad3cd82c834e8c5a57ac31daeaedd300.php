<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('hotel.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="twelve wide column">
	<form id="create-room-service-form" class="ui form segment" action="<?php echo e(url('hotel/room/service', $hotel->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
		<h6 class="ui horizontal header divider ihotel-title">Өрөөний дэлгэрэнгүй мэдээлэл</h6>
		<?php $__currentLoopData = $rooms->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="three fields">
				<?php $__currentLoopData = $roomSet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="required field">
						<label><?php echo e($room->name); ?></label>
						<div class="ui right labeled input">
							<input type="number" name="room-size-<?php echo e($room->id); ?>" min="1" value="<?php echo e($room->size); ?>">
							<div class="ui basic label">m2</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<h6 class="ui horizontal header divider ihotel-title"><?php echo e($category->name); ?></h6>
			<?php $__currentLoopData = $category->services->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="two fields">
					<?php $__currentLoopData = $serviceSet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="field">
							<label><?php echo e($service->name); ?></label>
							<select multiple="" name="service-<?php echo e($service->id); ?>[]" class="ui dropdown">
								<option value="">Сонгох</option>
								<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($room->id); ?>"
										<?php echo e($service->rooms->contains($room->id) ? 'selected' : ''); ?>>
							            <?php echo e($room->name); ?>

						            </option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<h6 class="ui horizontal header divider ihotel-title">Өрөөний танилцуулга</h6>
		<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="required field">
				<label><?php echo e($room->name); ?></label>
				<textarea name="room-introduction-<?php echo e($room->id); ?>"><?php echo e($room->introduction); ?></textarea>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<h6 class="ui horizontal header divider ihotel-title">Бусад мэдээлэл</h6>
		<div class="field">
			<textarea name="other_info" placeholder="Нэмэлт мэдээлэл"><?php echo e($hotel->other_info); ?></textarea>
		</div>
		<div class="ui right floated buttons">
			<a class="ui ihotel-back button" href="<?php echo e(url('hotel/room', $hotel->id)); ?>">Буцах</a>
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
	$('#create-room-service-form').form({
	    inline : true,
	    fields: {
			<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        size<?php echo e($room->id); ?>: {
		            identifier  : 'room-size-<?php echo e($room->id); ?>',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Хэмжээ оруулна уу'
		                },
		                {
			                type   : 'integer',
		                    prompt : 'Хэмжээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[10]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        introduction<?php echo e($room->id); ?>: {
		            identifier  : 'room-introduction-<?php echo e($room->id); ?>',
		            rules: [
		                {
		                    type   : 'empty',
		                    prompt : 'Танилцуулга оруулна уу'
		                }
		            ]
		        },
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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