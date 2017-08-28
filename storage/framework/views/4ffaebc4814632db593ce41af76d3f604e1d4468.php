<?php if($paginator->hasPages()): ?>
    <div class="ui borderless mini pagination menu">
        
        <?php if($paginator->onFirstPage()): ?>
            <div class="disabled item">&laquo;</div>
        <?php else: ?>
            <a class="item" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&laquo;</a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <div class="disabled item"><?php echo e($element); ?></div>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a class="active item"><?php echo e($page); ?></a>
                    <?php else: ?>
                        <a class="item" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a class="item" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">&raquo;</a>
        <?php else: ?>
            <div class="disabled item">&raquo;</div>
        <?php endif; ?>
    </div>
<?php endif; ?>
