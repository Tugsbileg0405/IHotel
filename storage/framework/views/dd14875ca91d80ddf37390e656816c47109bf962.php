<?php $__env->startSection('title', 'iHotel'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-breadcrumb">
    <div class="ui container">
        <div class="ui stackable column grid">
            <div class="six wide column">
                <h3 class="ui header"><?php echo e(__('messages.Order information')); ?></h3>
            </div>
            <div class="right aligned ten wide column">
                <div class="ui breadcrumb">
                    <a class="section" href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.Home')); ?></a>
                    <span class="divider">/</span>
                    <div class="active section"><?php echo e(__('messages.Order information')); ?></div>
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
                            <div class="ui sixteen column row">
                                <div class="four wide column"></div>
                                <div class="eight wide column">
                                    <div class="ui icon success message">
                                        <i class="check circle icon"></i>
                                        <div class="content">
                                            <div class="header">
                                            <?php echo e(__('messages.Your order is processed successfully')); ?>

                                            </div>
                                            <p><?php echo e(__('messages.Check your email')); ?></p>
                                        </div>
                                    </div>
                                    <div class="ui stackable grid">
                                        <div class="ui three column row">
                                            <div class="column">
                                                <a class="ui fluid  primary icon button" href="<?php echo e(url('/')); ?>">
                                                    <?php echo e(__('messages.Go to home page')); ?>

                                                </a>
                                            </div>
                                            <div class="column">
                                                <a class="ui fluid  primary icon button" href="<?php echo e(url('/profile/orders')); ?>">
                                                    <?php echo e(__('messages.Go to order page')); ?>

                                                </a>
                                            </div>
                                            <div class="column">
                                                <a class="ui fluid  primary icon button" href="<?php echo e(url('/searchresult')); ?>">
                                                    <?php echo e(__('messages.Go to search page')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="four wide column"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>