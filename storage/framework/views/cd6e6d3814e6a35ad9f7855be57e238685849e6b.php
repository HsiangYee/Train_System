<?php $__env->startSection('main'); ?>
    <div class="form1">
        <?php if(Session::has('error')): ?>
            <div class="error">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.station.update', ['id' => $Station->id])); ?>" method="post">
            <?php echo e(method_field('PATCH')); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <label>中文名稱</label> <br>
            <input type="text" name="ChineseName" value="<?php echo e($Station->ChineseName); ?>"> <br><p>
            <label>英文名稱</label> <br>
            <input type="text" name="EnglishName" value="<?php echo e($Station->EnglishName); ?>"> <br><p>
            <label>順序</label> <br>
            <select name="sequence">
                <option value="0">設為第一站</option>
                <?php foreach($Stations as $S){
                    if($S->sequence == $Station->sequence - 1){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    ?>
                    <option value="<?php echo e($S->sequence); ?>" <?php echo e($selected); ?>>設為<?php echo e($S->ChineseName); ?>之後</option>
                <?php } ?>
            </select>
            <div class="form1_button">
                <button class="button1">修改</button>
            </div>
        </form>
    <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>