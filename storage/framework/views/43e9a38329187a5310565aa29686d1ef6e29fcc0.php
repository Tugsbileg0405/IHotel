<div class="upload-zone-item">
	<img class="ui rounded image" src="<?php echo e(asset($photo)); ?>">
	<input type="text" name="photos[]" value="<?php echo e($photo); ?>" style="display: none;">
	<a class="upload-zone-button">
		<i class="close icon"></i>
	</a>
</div>