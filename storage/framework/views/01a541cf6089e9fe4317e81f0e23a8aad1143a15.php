<?php $__env->startSection('main'); ?>
    <div class="button_area">
        <a href="<?php echo e(route('admin.train.create')); ?>" class="button1">新增列車</a>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>