<?php $__env->startSection('main'); ?>
    <div class="button_area">
        <a href="<?php echo e(route('admin.station.create')); ?>" class="button1">新增車站</a>
    </div>

    <?php if(Session::has('success')): ?>
        <div class="success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <table class="info_table" width="100%">
        <thead>
            <tr>
                <td width="10%">順序</td>
                <td width="30%">中文名稱</td>
                <td width="30%">英文名稱</td>
                <td width="20%">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Stations as $Station){?>
                <tr>
                    <td>#<?php echo e($Station->sequence); ?></td>
                    <td><?php echo e($Station->ChineseName); ?></td>
                    <td><?php echo e($Station->EnglishName); ?></td>
                    <td>
                        
                        <form action="<?php echo e(route('admin.station.delete', ['id' => $Station -> id])); ?>" method="post">
                            <?php echo e(method_field('DELETE')); ?>

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <a href="<?php echo e(route('admin.station.edit', ['id' => $Station->id ])); ?>" class="button1">修改</a>
                            <button type="submit" class="button2" onclick="return confirm('確定刪除?')">刪除</button>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>