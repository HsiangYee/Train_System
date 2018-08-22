<?php $__env->startSection('main'); ?>
    <div class="form1">
        <?php if(Session::has('error')): ?>
            <div class="error">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('login.login')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <label>帳號</label> <br>
            <input type="text" name="acc"> <br><p>
            <label>密碼</label> <br>
            <input type="password" name="pass"> <br><p>

            <div class="form1_button">
                <button class="button1">登入</button>
            </div>
        </form>
    <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>