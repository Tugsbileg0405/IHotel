<div class="ui fluid vertical pointing menu">
    <a class="item<?php echo e(Request::is('admin/hotel/'.$hotel->id) ? ' active': ''); ?><?php echo e($hotel->step >= 2 ? '' : ' disabled'); ?>" href="<?php echo e(url('admin/hotel', $hotel->id)); ?>">
        Үндсэн мэдээлэл
    </a>
    <?php if($hotel->step >= 3): ?>
	    <a class="item<?php echo e(Request::is('admin/hotel/service/'.$hotel->id) ? ' active': ''); ?>" href="<?php echo e(url('admin/hotel/service', $hotel->id)); ?>">
	        Буудлын мэдээлэл
	    </a>
    <?php else: ?>
	    <a class="item disabled">
	        Буудлын мэдээлэл
	    </a>
    <?php endif; ?>
    <?php if($hotel->step >= 4): ?>
	    <a class="item<?php echo e(Request::is('admin/hotel/photo/'.$hotel->id) ? ' active': ''); ?>" href="<?php echo e(url('admin/hotel/photo', $hotel->id)); ?>">
	        Буудлын зураг
	    </a>
    <?php else: ?>
	    <a class="item disabled">
	        Буудлын зураг
	    </a>
    <?php endif; ?> 
    <?php if($hotel->co_day): ?>
	    <a class="item<?php echo e(Request::is('admin/hotel/payment/'.$hotel->id) ? ' active': ''); ?>" href="<?php echo e(url('admin/hotel/payment', $hotel->id)); ?>">
	        Төлбөрийн нөхцөл
	    </a>
    <?php else: ?>
	    <a class="item disabled">
	        Төлбөрийн нөхцөл
	    </a>
    <?php endif; ?>
    <?php if($hotel->co_day AND !$hotel->published): ?>
		<a class="item" href="<?php echo e(url('hotel/contract', $hotel->id)); ?>">
	        Гэрээ хийх
	    </a>
    <?php elseif(!$hotel->co_day): ?>
		<a class="item disabled">
	        Гэрээ хийх
	    </a>
    <?php endif; ?>
</div>