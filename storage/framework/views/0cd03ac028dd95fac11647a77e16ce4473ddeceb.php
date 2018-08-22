<?php $__env->startSection('main'); ?>
    <div class="button_area">
        <a href="<?php echo e(route('admin.type.create')); ?>" class="button1">新增車種</a>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <table class="info_table" width="100%">
        <thead>
            <tr>
                <td width="10%">編號</td>
                <td width="30%">車種名稱</td>
                <td width="30%">最高時速(km/h)</td>
                <td width="20%">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Types as $Type){?>
                <tr>
                    <td>#<?php echo e($Type->id); ?></td>
                    <td><?php echo e($Type->TypeName); ?></td>
                    <td><?php echo e($Type->HightSpeed); ?></td>
                    <td>
                        <form action="<?php echo e(route('admin.type.delete', ['id' => $Type->id])); ?>" method="post">
                            <?php echo e(method_field('DELETE')); ?>

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <a href="<?php echo e(route('admin.type.edit', ['id' => $Type->id])); ?>" class="button1">修改</a>
                            <button type="submit" class="button2" onclick="return confirm('確定刪除?')">刪除</button>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>