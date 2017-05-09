<div class="ui stackable secondary menu">
	<a class="item<?php echo e(Request::is('admin/hotel/'.$hotel->id) ? ' active' : ''); ?>" href="<?php echo e(url('admin/hotel', $hotel->id)); ?>">Буудлын мэдээлэл</a>
	<a class="item<?php echo e(Request::is('admin/hotel/rooms/'.$hotel->id) ? ' active' : ''); ?>" href="<?php echo e(url('admin/hotel/rooms', $hotel->id)); ?>">Өрөөний удирдлага</a>
	<a class="item<?php echo e(Request::is('admin/hotel/rating/'.$hotel->id) ? ' active' : ''); ?>" href="<?php echo e(url('admin/hotel/rating', $hotel->id)); ?>">Үйлчлүүлэгчдийн сэтгэгдэл
	<a class="item<?php echo e(Request::is('admin/hotel/order/'.$hotel->id) ? ' active' : ''); ?>" href="<?php echo e(url('admin/hotel/order', $hotel->id)); ?>">Захиалга</a>
	<a class="item<?php echo e(Request::is('admin/hotel/en/'.$hotel->id) ? ' active' : ''); ?>" href="<?php echo e(url('admin/hotel/en', $hotel->id)); ?>">Англи танилцуулга оруулах</a>
</div>