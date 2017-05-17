<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
    <div class="ui green segment">
    	<h4 class="ui header"><?php echo e($post->title); ?></h4>
    	<div class="ui divider"></div>
    	<form class="ui form" action="<?php echo e(url('profile/posts', $post->id)); ?>" method="POST">
    		<?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

    		<div class="two fields">
    			<div class="field  ">
    				<label><?php echo e(__('messages.Title')); ?></label>
    				<input type="text" name="title" value="<?php echo e($post->title); ?>">
    			</div>
    		    <div class="required field">
    		    	<label><?php echo e(__('messages.Category')); ?></label>
    		    	<select class="ui fluid dropdown" name="category">
    		    		<option value=""><?php echo e(__('messages.Choose a category')); ?>!</option>
    		    		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(App::isLocale('en')): ?>
    		    			<option value="<?php echo e($category->id); ?>" <?php echo e($post->category == $category ? 'selected':''); ?>><?php echo e($category->name_en); ?></option>
                            <?php elseif(App::isLocale('mn')): ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($post->category == $category ? 'selected':''); ?>><?php echo e($category->name); ?></option>
                            <?php endif; ?>
    		    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		    	</select>
    			</div>
    		</div>
    	    <div class="required field">
    	    	<label><?php echo e(__('messages.Description')); ?></label>
    	    	<textarea name="content" id="editor"><?php echo e($post->content); ?></textarea>
    		</div>
    	    <div class="required field">
    	        <label><?php echo e(__('messages.Short description')); ?></label>
    	        <textarea name="excerpt"><?php echo e($post->excerpt); ?></textarea>
    	    </div>
            <div class="required field">
                <label><?php echo e(__('messages.Cover photo')); ?></label>
                <div class="ui segment">
                    <a class="upload-browse">
                        <i class="plus icon"></i>
                    </a>
                    <div class="upload-zone">
                        <?php $__currentLoopData = unserialize($post->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="upload-zone-item">
                                <img class="ui rounded image" src="<?php echo e(asset($photo)); ?>">
                                <input type="hidden" name="photos[]" value="<?php echo e($photo); ?>">
                                <a class="upload-zone-button">
                                    <i class="close icon"></i>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <input type="file" name="photo" style="display: none">
                </div>
            </div>
    		<button class="ui right floated primary button" type="submit"><?php echo e(__('messages.Save')); ?></button>
    		<br></br>
    	</form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $('.upload-browse').click(function() {
        $(this).siblings('input[type=file]').click();
    });
    function isEmpty( el ){
        return !$.trim(el.html())
    }
    if (isEmpty($('.upload-zone'))) {
        $('.ui.form').find('button').addClass('disabled');
        if (isEmpty($('.upload-zone'))) {
            $('.ui.form').find('button').addClass('disabled');
        }
    }
    $('input[type=file]').change(function(){
        var segment = $(this).closest('.segment');
        var container = $(this).siblings('.upload-zone');
        segment.addClass('loading disabled');
        formData = new FormData();
        formData.append('photo', $(this)[0].files[0]);
        formData.append('_token', '<?php echo e(csrf_token()); ?>');
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("profile/post/photo")); ?>',     
            data: formData,
            contentType: false,
            processData: false,
            context: this,
        }).done(function(data) {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="upload-zone-item"><img class="ui rounded image" src="<?php echo e(asset("/")); ?>' + data.image + '"><input type="hidden" name="photos[]" value="' + data.image + '"><a class="upload-zone-button"><i class="close icon"></i></a></div>').appendTo(container).transition('scale in');
            $('.ui.form').find('button').removeClass('disabled');
        }).fail(function() {
            $(segment).removeClass('loading disabled');
            $(this).val('');
            $('<div class="ui warning message">Алдаа гарлаа</div>').appendTo(segment);

        });
    });
    $('.ui.form').form({
        inline : true,
        fields: {
            title: {
                identifier: 'title',
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
            category: {
                identifier: 'category',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter a value")); ?>'
                    }
                ]
            },
            excerpt: {
                identifier: 'excerpt',
                rules: [
                    {
                        type   : 'empty',
                        prompt : '<?php echo e(__("form.Please enter a value")); ?>'
                    }
                ]
            },
        },
        onSuccess: function() {
            $(this).find('button').addClass('loading disabled');
        }
    });
    $(document).on('click', '.upload-zone-button', function() {
        $(this).closest('.upload-zone-item').remove();
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>