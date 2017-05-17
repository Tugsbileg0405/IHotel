<?php $__env->startSection('title', 'Хамт олон'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<form class="ui form green segment" action="<?php echo e(url('profile/team', $team->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<?php echo e(method_field('PUT')); ?>

		
		<h4 class="ui header">Хамт олон засах</h4>
		<div class="ui divider"></div>
	    <div class="required field">
	    	<label>Нэр</label>
			<input type="text" name="name" value="<?php echo e($team->name); ?>">
		</div>
	    <div class="required field">
	    	<label>Нэр (Англи)</label>
			<input type="text" name="name_en" value="<?php echo e($team->name_en); ?>">
		</div>
	    <div class="required field">
	    	<label>Тайлбар</label>
			<input type="text" name="description" value="<?php echo e($team->description); ?>">
		</div>
	    <div class="required field">
	    	<label>Тайлбар (Англи)</label>
			<input type="text" name="description_en" value="<?php echo e($team->description_en); ?>">
		</div>
        <div class="required field">
	    	<label>Зураг</label>
            <div class="ui segment">
                <a class="upload-browse">
                    <i class="plus icon"></i>
                </a>
                <div class="upload-zone">
		  			<div class="upload-zone-item">
		  				<img class="ui rounded image" src="<?php echo e(asset($team->photo)); ?>">
		  			</div>
                </div>
                <input type="text" name="image" style="display: none" value="<?php echo e($team->photo); ?>" required>
                <input type="file" name="photo" style="display: none">
            </div>
        </div>
		<div class="field">
			<button class="ui button primary" type="submit">Хадгалах</button>
		</div>
	</form>
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
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo e(url("profile/team/photo")); ?>',    
	            data: new FormData($(this).closest('form')[0]),
	            contentType: false,
	            processData: false,
	            context: this,
	        }).done(function(data) {
	            $('input[name=image]').val(data.image);
	            $(segment).removeClass('loading disabled');
	            $(this).val('');
	            $(container).empty();
	            $('<div class="upload-zone-item"><img class="ui rounded image" src="<?php echo e(asset("/")); ?>' + data.image + '"></div>').appendTo(container).transition('scale in');
	        }).fail(function() {
	            $(segment).removeClass('loading disabled');
	            $(this).val('');
	            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

	        });
	    });
		$('.ui.form').form({
		    inline : true,
		    fields: {
		        name: {
		            identifier: 'name',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Нэр оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        name_en: {
		            identifier: 'name_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Нэр оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        description: {
		            identifier: 'description',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Тайлбар оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
		                }
		            ]
		        },
		        description_en: {
		            identifier: 'description_en',
		            rules: [
		                {
			                type   : 'empty',
			                prompt : 'Тайлбар оруулна уу'
		                },
		                {
		                    type   : 'maxLength[191]',
		                    prompt : 'Хэтэрхий олон тэмдэгт оруулсан байана'
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