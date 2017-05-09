<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header">Түгээмэл асуултууд</h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section">Эхлэл</a>
                    <span class="divider">/</span>
                    <div class="active section">Нэвтрэх</div>
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
                                    <form class="ui form segment" id="password-reset">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                        <h4 class="ui header">Нууц үг шинэчлэх</h4>
                                        <div class="ui divider"></div>
                                        <div class="field">
                                            <input type="email" name="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" placeholder="И-мэйл">
                                        </div>
                                        <div class="field">
                                            <input type="password" name="password" placeholder="Нууц үг">
                                        </div>
                                        <div class="field">
                                            <input type="password" name="password_confirmation" placeholder="Нууц  үг дахин оруулна уу">
                                        </div>
                                        <div class="field">
                                            <button class="ui default fluid button" type="submit">Нууц үг шинэчлэх</button>
                                        </div>
                                    </form>
                                    <div id="password-reset-msg"></div>
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
    $("#password-reset").submit(function(e) {
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
            password: {
                identifier: 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Нууц үг оруулна уу'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : 'Таны нууц үг дор хаяж 6 тэмдэгт агуулсан байх шаардлагатай'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
                    }
                ]
            },
            password_confirmation: {
                identifier: 'password_confirmation',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Нууц үг оруулна уу'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : 'Таны нууц үг дор хаяж 6 тэмдэгт агуулсан байх шаардлагатай'
                    },
                    {
                        type   : 'maxLength[191]',
                        prompt : 'Хэтэрхий олон тэмдэгт оруулсан байна'
                    }
                ]
            },
        },
        onSuccess: function() {
            $('#password-reset button').addClass('loading disabled');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('password/reset')); ?>",
                data: $("#password-reset").serialize(),
                success: function(data) {
                    $('#password-reset button').removeClass('loading disabled');
                    $('#password-reset-msg').html('<div class="ui success message">Нууц үг амжилтай шинэчлэгдлээ. Та түр хүлээнэ үү... <i class="ui tiny active inline loader"><div>');
                    window.location.href = "<?php echo e(url('/')); ?>";
                },
                error: function(data){
                    $('#password-reset button').removeClass('loading disabled');
                    var errors = data.responseJSON;
                    var reseterror = '<div class="ui warning message"><ul>';
                    $.each(errors, function( key, value ) {
                        reseterror += '<li>' + value[0] + '</li>';
                    });
                    reseterror += '</div></ul>';
                    $('#password-reset-msg').html(reseterror);
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>