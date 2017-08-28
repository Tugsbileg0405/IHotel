<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('hotel.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="twelve wide column">
	<div class="ui segment">
		<form id="create-room-photo-form" class="ui form" action="<?php echo e(url('hotel/room/photo', $hotel->id)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

			<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="required field">
					<label><?php echo e($room->name); ?> зураг</label>
					<div class="ui segment">
				  		<a class="upload-browse">
				  			<i class="plus icon"></i>
				  		</a>
						<input type="file" name="photo-<?php echo e($room->id); ?>" data-id="<?php echo e($room->id); ?>" style="display: none">
				  		<div class="upload-zone">
				  			<?php if($room->photos): ?>
					  			<?php if(count(unserialize($room->photos)) > 0): ?>
					  				<?php $__currentLoopData = unserialize($room->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="upload-zone-item">
											<img class="ui rounded image" src="<?php echo e(asset($photo)); ?>">
											<input type="text" name="photos-<?php echo e($room->id); ?>[]" value="<?php echo e($photo); ?>" style="display: none;">
											<a class="upload-zone-button">
												<i class="close icon"></i>
											</a>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  			<?php endif; ?>
					  		<?php endif; ?>
				  		</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<div class="ui right floated buttons">
				<a class="ui ihotel-back button" href="<?php echo e(url('hotel/room/service', $hotel->id)); ?>">Буцах</a>
				<div class="or"></div>
				<button class="ui primary button" type="submit">
					Дараах<i class="right chevron icon"></i>
				</button>
			</div><br><br>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#create-room-photo-form').form({
		    onSuccess: function() {
		    	$(this).find('button').addClass('loading disabled');
		    }
		});
		$('.upload-browse').click(function() {
			$(this).siblings('input[type=file]').click();
		});
		function isEmpty( el ){
			return !$.trim(el.html())
		}
		var empty = false;
		$('.upload-zone').each(function() {
			if(isEmpty($(this))) {
				empty = true;
			}
		});
		if (empty) {
			$('#create-room-photo-form').find('button').addClass('disabled');
		} else {
			$('#create-room-photo-form').find('button').removeClass('disabled');
		}
		$('input[type=file]').change(function(){
			var segment = $(this).closest('.segment');
			var container = $(this).siblings('.upload-zone');
			segment.addClass('loading disabled');
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("hotel/room/upload")); ?>' + '/' + id,	
	           	data: new FormData($(this).closest('form')[0]),
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
		            $(this).val('');
					$(segment).removeClass('loading disabled');
					$(data).appendTo(container).transition('scale in');
					var empty = false;
					$('.upload-zone').each(function() {
						if(isEmpty($(this))) {
							empty = true;
						}
					});
					if (empty) {
						$('#create-room-photo-form').find('button').addClass('disabled');
					} else {
						$('#create-room-photo-form').find('button').removeClass('disabled');
					}
			}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$(document).on('click', '.upload-zone-button', function() {
	   		$(this).closest('.upload-zone-item').remove();
			var empty = false;
			$('.upload-zone').each(function() {
				if(isEmpty($(this))) {
					empty = true;
				}
			});
			if (empty) {
				$('#create-room-photo-form').find('button').addClass('disabled');
			} else {
				$('#create-room-photo-form').find('button').removeClass('disabled');
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hotel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>