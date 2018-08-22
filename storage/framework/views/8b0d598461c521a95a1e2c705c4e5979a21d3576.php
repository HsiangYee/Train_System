<?php $__env->startSection('main'); ?>
    <div class="form1">
        <?php if(Session::has('error')): ?>
            <div class="error">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.station.add')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <label>中文名稱</label> <br>
            <input type="text" name="ChineseName"> <br><p>
            <label>英文名稱</label> <br>
            <input type="text" name="EnglishName"> <br><p>
            <label>順序</label> <br>
            <select name="sequence">
                <option value="0">設為第一站</option>
                <?php foreach($Stations as $Station){?>
                    <option value="<?php echo e($Station->sequence); ?>">設為<?php echo e($Station->ChineseName); ?>之後</option>
                <?php } ?>
            </select>
            <div class="form1_button">
                <button class="button1">新增</button>
            </div>
        </form>
    <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>