<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('hotel.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="twelve wide column">
	<div class="ui segment">
		<img class="ui centered tiny image hotel-add" src="<?php echo e(asset('img/marker.png')); ?>">
		<h6 class="ui horizontal header divider ihotel-title">Буудлын зураг</h6>
		<form id="create-hotel-photo-form" class="ui form" action="<?php echo e(url('hotel/photo', $hotel->id)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

			<div class="required field">
				<label>Үндсэн зураг</label>
				<div class="ui segment">
			  		<a class="upload-browse">
			  			<i class="image icon"></i>
			  		</a>
		  			<input type="file" name="file" id="photo" style="display: none">
			  		<div class="upload-zone" id="cover-photo">
			  			<?php if($hotel->cover_photo): ?>
			  				<div class="upload-zone-item">
								<img class="ui rounded image" src="<?php echo e(asset($hotel->cover_photo)); ?>">
								<input type="text" name="photo" value="<?php echo e($hotel->cover_photo); ?>" style="display: none;">
								<a class="upload-zone-button">
									<i class="close icon"></i>
								</a>
							</div>
			  			<?php endif; ?>
			  		</div>
				</div>
			</div>
			<?php echo e(csrf_field()); ?>

			<div class="required field">
				<label>Бусад зураг</label>
				<div class="ui segment">
			  		<a class="upload-browse">
			  			<i class="image icon"></i>
			  		</a>
					<input type="file" name="files" id="photos" style="display: none">
			  		<div class="upload-zone" id="other-photos">
			  			<?php if($hotel->other_photos): ?>
			  				<?php $__currentLoopData = unserialize($hotel->other_photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  			<div class="upload-zone-item">
									<img class="ui rounded image" src="<?php echo e(asset($photo)); ?>">
									<input type="text" name="photos[]" value="<?php echo e($photo); ?>" style="display: none;">
									<a class="upload-zone-button">
										<i class="close icon"></i>
									</a>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  			<?php endif; ?>
		  			</div>
				</div>
			</div>
			<div class="ui right floated buttons">
				<a class="ui ihotel-back button" href="<?php echo e(url('hotel/service', $hotel->id)); ?>">Буцах</a>
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
		$('#create-hotel-photo-form').form({
		    onSuccess: function() {
		    	$(this).find('button').addClass('loading disabled');
		    }
		});
		$('.upload-browse').click(function() {
			$(this).siblings('input[type=file]').click();
		});
		var cover = $('#cover-photo');
		var photos = $('#other-photos');
		function isEmpty( el ){
			return !$.trim(el.html())
		}
		if (isEmpty(cover) || isEmpty(photos)) {
			$('#create-hotel-photo-form').find('button').addClass('disabled');
		}
		$('#photo').change(function(){
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("hotel/upload")); ?>',	
	           	data: new FormData($(this).closest('form')[0]),
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
	       		$(cover).empty();
	            $(this).val('');
				$(segment).removeClass('loading disabled');
				$(data).appendTo(cover).transition('scale in');
				if (isEmpty(cover) || isEmpty(photos)) {
					$('#create-hotel-photo-form').find('button').addClass('disabled');
				} else {
					$('#create-hotel-photo-form').find('button').removeClass('disabled');
				}
	   		}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$('#photos').change(function(){
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("hotel/upload/photos")); ?>',	
	           	data: new FormData($(this).closest('form')[0]),
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
            	$(this).val('');
				$(segment).removeClass('loading disabled');
				$(data).appendTo(photos).transition('scale in');
				if (isEmpty(cover) || isEmpty(photos)) {
					$('#create-hotel-photo-form').find('button').addClass('disabled');
				} else {
					$('#create-hotel-photo-form').find('button').removeClass('disabled');
				}
			}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$(document).on('click', '#cover-photo .upload-zone-button', function() {
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$(segment).removeClass('loading disabled');
       		$(this).closest('.upload-zone-item').remove();
			if (isEmpty(cover) || isEmpty(photos)) {
				$('#create-hotel-photo-form').find('button').addClass('disabled');
			} else {
				$('#create-hotel-photo-form').find('button').removeClass('disabled');
			}
		});
		$(document).on('click', '#other-photos .upload-zone-button', function() {
       		$(this).closest('.upload-zone-item').remove();
			if (isEmpty(cover) || isEmpty(photos)) {
				$('#create-hotel-photo-form').find('button').addClass('disabled');
			} else {
				$('#create-hotel-photo-form').find('button').removeClass('disabled');
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hotel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>