<html>

<head>
    <style>
        .column {
            float: left;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="column">
        <h4><?php echo e(__('messages.Order information')); ?></h4>
        <table border="0" cellspacing="0" cellpadding="5">
            <tbody>
                <tr>
                    <td colspan="2">
                        <p style="text-align:left">
                            <strong>
                             <?php if(App::isLocale('mn')): ?> 
							 	<?php echo e($order->hotel->name); ?>

							 <?php elseif(App::isLocale('en')): ?>
                                <?php if($order->hotel->name_en): ?>
									<?php echo e($order->hotel->name_en); ?>

								<?php else: ?>
									<?php echo e($order->hotel->name); ?>

								<?php endif; ?>
							 <?php endif; ?>
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><?php echo e(__('messages.The order number')); ?>:</td>
                    <td><strong><?php echo e($order->number); ?></strong></td>
                </tr>
                <tr>
                    <td><?php echo e(__('messages.Phone')); ?>:</td>
                    <td><strong><?php echo e($order->hotel->phone_number); ?></strong></td>
                </tr>
                <?php if($order->hotel->website): ?>
                    <tr>
                        <td><?php echo e(__('messages.Website')); ?>:</td>
                        <td><strong><?php echo e($order->hotel->website); ?></strong></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><?php echo e(__('messages.Check-in')); ?>:</td>
                    <td><strong><?php echo e($order->startdate); ?></strong></td>
                </tr>
                <tr>
                    <td><?php echo e(__('messages.Check-out')); ?>:</td>
                    <td><strong><?php echo e($order->enddate); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="column">
        <h4><?php echo e(__('messages.Ordered rooms')); ?></h4>
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th><?php echo e(__('messages.Room name')); ?></th>
                    <th><?php echo e(__('messages.Rooms')); ?></th>
                    <th><?php echo e(__('messages.Cost of per night')); ?></th>
                    <th><?php echo e(__('messages.Day')); ?></th>
                    <th><?php echo e(__('messages.Total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($room->name); ?></td>
                        <td><?php echo e($room->ordered_number); ?></td>
                        <?php if(App::isLocale('mn')): ?> 
                            <?php if($room->saled_room): ?>
                                <td><?php echo e(number_format($room->saled_room->price)); ?> ₮</td>
                            <?php else: ?>
                                <td><?php echo e(number_format($room->price)); ?> ₮</td>
                            <?php endif; ?>
                        <?php elseif(App::isLocale('en')): ?>
                            <?php if($room->saled_room): ?>
                                <td><?php echo e(number_format($room->saled_room->price/$order->dollar_rate,2)); ?> ₮</td>
                            <?php else: ?>
                                <td><?php echo e(number_format($room->price/$order->dollar_rate,2)); ?> $</td>
                            <?php endif; ?>
                        <?php endif; ?>
                        <td><?php echo e($order->day); ?></td>
                        <?php if(App::isLocale('mn')): ?> 
                            <?php if($room->saled_room): ?>
                                <td><?php echo e(number_format($room->saled_room->price * $room->ordered_number * $order->day)); ?> ₮</td>
                            <?php else: ?>
                                <td><?php echo e(number_format($room->price * $room->ordered_number * $order->day)); ?> ₮</td>
                            <?php endif; ?>
                        <?php elseif(App::isLocale('en')): ?>
                            <?php if($room->saled_room): ?>
                                <td><?php echo e(number_format($room->saled_room->price * $room->ordered_number * $order->day/$order->dollar_rate,2)); ?> $</td>
                            <?php else: ?>
                                <td><?php echo e(number_format($room->price * $room->ordered_number * $order->day/$order->dollar_rate,2)); ?> $</td>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->pickup): ?>
                    <tr>
                        <td colspan="2"><?php echo e(__('messages.Pickup service')); ?></td>
                        <?php if(App::isLocale('mn')): ?>
                            <td colspan="3"><?php echo e($order->pickup->name); ?> - <?php echo e(number_format($order->pickup->price)); ?>₮</td>
                        <?php elseif(App::isLocale('en')): ?>
                            <td colspan="3"><?php echo e($order->pickup->name_en); ?> - <?php echo e(number_format($order->pickup->price/$order->dollar_rate,2)); ?>$</td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="2"><?php echo e(__('messages.Price before tax')); ?> (<?php echo e(__('messages.Tax')); ?> 10%)</td>
                    <?php if($order->dollar_rate): ?> 
                        <td colspan="3"><?php echo e(number_format($price/$order->dollar_rate,2)); ?> $ (<?php echo e(number_format($price*0.1/$order->dollar_rate,2)); ?> $)</td>
                    <?php else: ?>
                        <td colspan="3"><?php echo e(number_format($price)); ?> ₮ (<?php echo e(number_format($price*0.1)); ?> ₮)</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td colspan="2"><?php echo e(__('messages.Price after tax')); ?></td>
                    <?php if($order->dollar_rate): ?> 
                        <td colspan="3"><?php echo e(number_format($order->price/$order->dollar_rate,2)); ?> $</td>
                    <?php else: ?>
                        <td colspan="3"><?php echo e(number_format($order->price)); ?> ₮</td>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>