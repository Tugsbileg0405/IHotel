<div class="sixteen wide column ihotel-progress">
    <div class="ui tiny green progress" data-value="
    	<?php echo e($hotel->step == 2 ? '20' : ''); ?>

    	<?php echo e($hotel->step == 3 ? '30' : ''); ?>

    	<?php echo e($hotel->step == 4 ? '40' : ''); ?>

    	<?php echo e($hotel->step == 5 ? '50' : ''); ?>

    	<?php echo e($hotel->step == 6 ? '60' : ''); ?>

    	<?php echo e($hotel->step == 7 ? '80' : ''); ?>

    	<?php echo e($hotel->co_day ? '90' : ''); ?>" data-total="100">
        <div class="bar"></div>
    </div>
</div>
<div class="four wide column">
    <div class="ui fluid vertical pointing menu">
        <a class="item<?php echo e(Request::is('hotel/update/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 1 ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/update', $hotel->id)); ?>">
            Үндсэн мэдээлэл
            <?php if($hotel->step > 1): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <a class="item<?php echo e(Request::is('hotel/service/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 2 ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/service', $hotel->id)); ?>">
            Буудлын мэдээлэл
            <?php if($hotel->step > 2): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <a class="item<?php echo e(Request::is('hotel/photo/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 3 ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/photo', $hotel->id)); ?>">
            Буудлын зураг
            <?php if($hotel->step > 3): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <a class="item<?php echo e(Request::is('hotel/room/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 4 ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/room', $hotel->id)); ?>">
            Өрөөний товч мэдээлэл
            <?php if($hotel->step > 4): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <a class="item<?php echo e(Request::is('hotel/room/service/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 5 ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/room/service', $hotel->id)); ?>">
            Өрөөний дэлгэрэнгүй
            <?php if($hotel->step > 5): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <a class="item<?php echo e(Request::is('hotel/room/photo/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 6 ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/room/photo', $hotel->id)); ?>">
            Өрөөний зураг
            <?php if($hotel->step > 6): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <a class="item<?php echo e(Request::is('hotel/payment/'.$hotel->id) ? ' active': ''); ?>

            <?php if($hotel->step != 7 AND $hotel->co_day == null): ?>
                disabled
            <?php endif; ?>" href="<?php echo e(url('hotel/payment', $hotel->id)); ?>">
            Төлбөрийн нөхцөл
            <?php if($hotel->co_day): ?>
				<i class="icon large green check circle"></i>
            <?php endif; ?>
        </a>
        <?php if(!$hotel->published): ?>
            <a class="item<?php echo e(Request::is('hotel/contract/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->co_day ? '' : ' disabled'); ?>" href="<?php echo e(url('hotel/contract', $hotel->id)); ?>">
                Гэрээ хийх
                <?php if($hotel->published): ?>
                    <i class="icon large green check circle"></i>
                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
</div>