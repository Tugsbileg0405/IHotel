<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header"><?php echo e(__('messages.Forgot password?')); ?></h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section"><?php echo e(__('messages.Home')); ?></a>
                    <span class="divider">/</span>
                    <div class="active section"><?php echo e(__('messages.Forgot password?')); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="silver-back">
    <div class="main-page">
        <div class="ui fluid stackable container">
            <div class="ui column grid">
                <div class="sixteen wide column">
                    <div class="ui stackable container">
                        <div class="ui stackable grid">
                            <div class="ui three column row">
                                <div class="column"></div>
                                <div class="column">
                                    <form class="ui form segment" id="reset">
                                        <?php echo e(csrf_field()); ?>

                                        <h4 class="ui header"><?php echo e(__('messages.Forgot password?')); ?></h4>
                                        <div class="ui divider"></div>
                                        <p class="ui center aligned container"><?php echo e(__('messages.Forgot password? Please enter your email registered on this site')); ?></p>
                                        <div class="field">
                                            <input type="email" name="email" placeholder="<?php echo e(__('messages.Email')); ?>" value="<?php echo e(old('email')); ?>" required>
                                        </div>
                                        <div class="field">
                                            <button class="ui default fluid button" type="submit"><?php echo e(__('messages.Send reset password link')); ?></button>
                                        </div>
                                    </form>
                                    <div id="reset-msg"></div>
                                </div>
                                <div class="column"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $("#reset").submit(function(e) {
        e.preventDefault(); 
    }).form({
        inline: true,
        fields: {
            email: {
                identifier: 'email',
                rules: [
                    {
                        type: 'email',
                        prompt: 'И-мэйл хаяг оруулна уу'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#reset button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('password/email')); ?>",
                data: $("#reset").serialize(),
                success: function(data) {
                    $('#reset button').removeClass('loading disabled');
                    $('#reset-msg').html('<div class="ui success message">Таны и-мэйл хаяг руу нууц үг шинэчлэх холбоос илгээгдлээ<div>');
                },
                error: function(data){
                    $('#reset button').removeClass('loading disabled');
                    var errors = data.responseJSON;
                    var reseterror = '<div class="ui warning message"><ul>';
                    $.each(errors, function( key, value ) {
                        reseterror += '<li>' + value[0] + '</li>';
                    });
                    reseterror += '</div></ul>';
                    $('#reset-msg').html(reseterror);
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>