<?php $__env->startSection('title', 'Хамт олон'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header">Нүүр хуудасны зураг</h4>
		<div class="ui divider"></div>
        <form>
			<div class="required field">
				<label>Англи хуудасны зураг</label>
				<div class="ui segment">
			  		<a class="upload-browse">
			  			<i class="image icon"></i>
			  		</a>
					<input type="file" name="photo_en" id="photo_en" style="display: none">
			  		<div class="upload-zone" id="photos-en">
                        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($slide->locale == 1): ?>
                                <div class="upload-zone-item">
                                    <img class="ui rounded image" src="<?php echo e(asset($slide->photo)); ?>">
                                    <a class="upload-zone-button" data-id="<?php echo e($slide->id); ?>">
                                        <i class="close icon"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  			</div>
				</div>
			</div><br>
			<div class="required field">
				<label>Монгол хуудасны зураг</label>
				<div class="ui segment">
			  		<a class="upload-browse">
			  			<i class="image icon"></i>
			  		</a>
					<input type="file" name="photo_mn" id="photo_mn" style="display: none">
			  		<div class="upload-zone" id="photos-mn">
                        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($slide->locale == 2): ?>
                                <div class="upload-zone-item">
                                    <img class="ui rounded image" src="<?php echo e(asset($slide->photo)); ?>">
                                    <a class="upload-zone-button" data-id="<?php echo e($slide->id); ?>">
                                        <i class="close icon"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  			</div>
				</div>
			</div>
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
		var photos_en = $('#photos-en');
		var photos_mn = $('#photos-mn');
		$('#photo_en').change(function(){
            var formData = new FormData();
            formData.append('file', $('#photo_en')[0].files[0]);
            formData.append('_token', '<?php echo e(csrf_token()); ?>');
            formData.append('locale', 1);
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("profile/slide/upload")); ?>',	
	           	data: formData,
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
	            $(this).val('');
				$(segment).removeClass('loading disabled');
				$(data).appendTo(photos_en).transition('scale in');
	   		}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$('#photo_mn').change(function(){
            var formData = new FormData();
            formData.append('file', $('#photo_mn')[0].files[0]);
            formData.append('_token', '<?php echo e(csrf_token()); ?>');
            formData.append('locale', 2);
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("profile/slide/upload")); ?>',	
	           	data: formData,
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
	            $(this).val('');
				$(segment).removeClass('loading disabled');
				$(data).appendTo(photos_mn).transition('scale in');
	   		}).fail(function() {
	            $(this).val('');
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
		$(document).on('click', '.upload-zone-button', function() {
            var id = $(this).data('id');
            var formData = new FormData();
            formData.append('_token', '<?php echo e(csrf_token()); ?>');
			var segment = $(this).closest('.segment');
			segment.addClass('loading disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo e(url("profile/slide/destroy")); ?>/' + id,
	           	data: formData,
				contentType: false,
				processData: false,
	  			context: this,
			}).done(function(data) {
                $(this).closest('.upload-zone-item').remove();
				$(segment).removeClass('loading disabled');
	   		}).fail(function() {
	            $(segment).removeClass('loading disabled');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);
	        });
		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>