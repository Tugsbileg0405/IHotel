<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header"><?php echo e($room->name); ?> - дэлгэрэнгүй мэдээлэл</h4>
		<div class="ui divider"></div>
		<form class="ui form">
			<?php echo e(csrf_field()); ?>

			<div class="field">
				<div class="ui segment">
			  		<a class="ui circular icon button upload-browse">
			  			<i class="plus icon"></i>
			  		</a><br><br>
					<input type="file" name="photo" id="<?php echo e($room->id); ?>" style="display: none">
			  		<div class="upload-zone" id="other-photos">
				  		<?php if($room->photos): ?>
				  			<?php $__currentLoopData = unserialize($room->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  			<div class="upload-zone-item">
					  				<img class="ui rounded image" src="<?php echo e(asset($photo)); ?>" path="<?php echo e($photo); ?>">
				  					<a class="upload-zone-button">
				  						<i class="close icon"></i>
				  					</a>
				  				</div>
				  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  		<?php endif; ?>
			  		</div>
				</div>
			</div>
		</form><br>
		<form class="ui form" action="<?php echo e(url('profile/hotel/room', $room->id)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('PUT')); ?>

			<div class="field">
				<label>Өрөөний хэмжээ</label>
				<div class="ui form">
					<div class="field">
						<div class="ui right labeled input">
							<input type="number" name="size" value="<?php echo e($room->size); ?>">
							<div class="ui basic label">
								m2
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<h6 class="ui horizontal header divider ihotel-title"><?php echo e($category->name); ?></h6>
				<div class="field">
					<div class="ui form">
						<div class="field">
							<select multiple="" name="services[]" class="ui dropdown">
								<option value="">Сонгох</option>
									<?php $__currentLoopData = $category->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($service->id); ?>" <?php echo e($room->services->contains($service->id) ? 'selected':''); ?>><?php echo e($service->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<h6 class="ui horizontal header divider ihotel-title">Өрөөний танилцуулга</h6>
			<div class="field">
				<div class="ui form">
					<div class="required field">
						<textarea name="introduction"><?php echo e($room->introduction); ?></textarea>
					</div>
				</div>
			</div>
			<div class="ui right floated buttons">
				<button class="ui primary button" type="submit">Хадгалах</button>
			</div><br><br><br>
		</form>
	</div>	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.upload-browse').click(function() {
			$(this).siblings('input[type=file]').click();
		});
		$('input[type=file]').change(function(){
			var segment = $(this).closest('.segment');
			var container = $(this).siblings('.upload-zone');
			segment.addClass('loading disabled');
			var id = $(this).attr('id');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("hotel/roomphoto", $room->hotel->id)); ?>' + '/' + id,	
	           	data: new FormData($(this).closest('form')[0]),
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
					$(segment).removeClass('loading disabled');
					$(this).closest('form')[0].reset();
					$('<div class="upload-zone-item"><img class="ui rounded image" src="<?php echo e(asset("/")); ?>' + data.photo + '" path="' + data.photo + '"><a class="upload-zone-button"><i class="close icon"></i></a></div>').appendTo(container).transition('scale in');
			}).fail(function() {
	            $(segment).removeClass('loading disabled');
	            $(this).val('');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

	        });
		});
		$(document).on('click', '.upload-zone-button', function() {
			var segment = $(this).closest('.segment');
			var container = $(this).closest('.upload-zone');
			var path = $(this).siblings('.image').attr('path');
			segment.addClass('loading disabled');
			var id = $(this).closest('.upload-zone').siblings('input[type=file]').attr('id');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("hotel/roomphoto/destroy", $room->hotel->id)); ?>' + '/' + id,
	           	data: {'path': path, '_token': '<?php echo e(csrf_token()); ?>'},
	  			context: this,
			}).done(function() {
					$(segment).removeClass('loading disabled');
	           		$(this).closest('.upload-zone-item').remove();
			}).fail(function() {
	            $(segment).removeClass('loading disabled');
	            $(this).val('');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

	        });
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.ui.form').form({
		    inline : true,
		    fields: {
		        size: {
		            identifier: 'size',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Хэмжээ оруулна уу'
		                },
		                {
		                    type   : 'maxLength[10]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        introduction: {
		            identifier: 'introduction',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Тайлбар оруулна уу'
		                }
		            ]
		        },
		    },
		    onSuccess: function() {
		    	$('.ui.form button').addClass('loading disabled');
		    }
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>