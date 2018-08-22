<?php $__env->startSection('main'); ?>
    <div class="form1">
        <?php if(Session::has('error')): ?>
            <div class="error">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.type.update', ['id' => $Type->id])); ?>" method="post">
            <?php echo e(method_field('PATCH')); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <label>車種名稱</label> <br>
            <input type="text" name="TypeName" value="<?php echo e($Type->TypeName); ?>"> <br><p>
            <label>最高時速(km/h)</label> <br>
            <input type="number" name="HightSpeed" min="0" value="<?php echo e($Type->HightSpeed); ?>"> <br><p>

            <div class="form1_button">
                <button class="button1">修改</button>
            </div>
        </form>
    <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>