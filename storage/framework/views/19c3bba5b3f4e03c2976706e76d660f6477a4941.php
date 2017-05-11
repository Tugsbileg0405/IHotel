<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="eleven wide column">
	<div class="ui green segment">
		<h4 class="ui header"> <?php echo e(__('messages.Edit profile')); ?></h4>
		<div class="ui divider"></div>
	    <?php if(session('status')): ?>
	        <div class="ui success message">
               <i class="check icon"></i><?php echo e(session('status')); ?>

	        </div>
	    <?php endif; ?>
		<form class="ui form" action="<?php echo e(url('profile')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('PUT')); ?>

			<div class="two fields">
				<div class="field">
					<label><?php echo e(__('messages.Surname')); ?></label>
					<input type="text" name="surname" placeholder="<?php echo e(__('messages.Surname')); ?>" value="<?php echo e(Auth::user()->surname); ?>">
				</div>
				<div class="field">
					<label><?php echo e(__('messages.Name')); ?></label>
					<input type="text" name="name" placeholder="<?php echo e(__('messages.Name')); ?>" value="<?php echo e(Auth::user()->name); ?>">
				</div>
			</div>
            <div class="field">
				<label><?php echo e(__('messages.Profile picture')); ?></label>
                <div class="ui segment">
                    <a class="upload-browse">
                        <i class="image icon"></i>
                    </a>
                    <div class="upload-zone">
                        <div class="upload-zone-item">
                            <img class="ui rounded image" src="<?php echo e(asset(Auth::user()->avatar)); ?>">
                        </div>
                    </div>
                    <input type="text" name="image" style="display: none" value="<?php echo e(Auth::user()->avatar); ?>" required>
                    <input type="file" name="photo" style="display: none">
                </div>
            </div>
		    <div class="field">
		    	<label><?php echo e(__('messages.Sex')); ?></label>
		    	<select class="ui fluid dropdown" name="gender">
		    		<option value=""><?php echo e(__('messages.Choose a sex')); ?>!</option>
	    			<option value="female" <?php echo e(Auth::user()->gender == 'female' ? 'selected':''); ?>><?php echo e(__('messages.Female')); ?></option>
	    			<option value="male" <?php echo e(Auth::user()->gender == 'male' ? 'selected':''); ?>><?php echo e(__('messages.Male')); ?></option>
		    	</select>
			</div>
			<div class="two fields">
				<div class="field">
					<label><?php echo e(__('messages.Phone')); ?></label>
					<input type="text" name="phone_number" placeholder="<?php echo e(__('messages.Phone')); ?>" value="<?php echo e(Auth::user()->phone_number); ?>">
				</div>
				<div class="required field">
					<label><?php echo e(__('messages.Email')); ?></label>
					<input type="text" name="email" placeholder="<?php echo e(__('messages.Email')); ?>" value="<?php echo e(Auth::user()->email); ?>">
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
    $('input[type=file]').change(function(){
        var segment = $(this).closest('.segment');
        var container = $(this).siblings('.upload-zone');
        segment.addClass('loading disabled');
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("profile/update/photo")); ?>',     
            data: new FormData($(this).closest('form')[0]),
            contentType: false,
            processData: false,
            context: this,
        }).done(function(data) {
            $('input[name=image]').val(data.image);
            $(segment).removeClass('loading disabled');
            $(container).empty();
            $(this).val('');
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
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            surname: {
                identifier: 'surname',
                rules: [
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            email: {
                identifier: 'email',
                rules: [
                    {
                        type: 'email',
                        prompt: '<?php echo e(__("form.Please enter your email")); ?>'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            country: {
                identifier: 'country',
                rules: [
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
            phone_number: {
                identifier: 'phone_number',
                rules: [
                    {
                        type   : 'maxLength[191]',
                        prompt : '<?php echo e(__("form.Please enter at most 191 characters")); ?>'
                    }
                ]
            },
        },
        onSuccess: function() {
            $(this).find('button').addClass('loading disabled');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>