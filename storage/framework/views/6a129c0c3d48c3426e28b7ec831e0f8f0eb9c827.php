<?php $__env->startSection('main'); ?>
    <div class="form2">
        <?php if(Session::has('error')): ?>
            <div class="error">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.train.add')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="train_create_title">
                <?php echo e($StartStation->ChineseName); ?>　到　<?php echo e($EndStation->ChineseName); ?>

            </div> <br> <p>

            <label>列車編號</label> <br>
            <input type="text" value="<?php echo e(Session::get('info.TrainNumber')); ?>" readonly="true" class="readonly"> <br> <p>

            <label>發車星期</label> <br>
            <input type="text" value="星期<?php echo e($Dates[Session::get('info.date')]); ?>" readonly="true" class="readonly"> <br> <p>

            <label>發車時間</label> <br>
            <input type="time" value="<?php echo e(Session::get('info.time')); ?>" readonly="true" class="readonly"> <br> <p>

            <?php foreach($Stations_Route as $Station_Route){?>
                <input type="hidden" name="Station_id[]" value="<?php echo e($Station_Route->id); ?>">
                <table width="100%" style="margin:20px 0 0 0">
                    <thead>
                        <tr>
                            <td style="text-align:left;font-size:18px;border-top:1px #000 solid;" colspan="3"><b>#<?php echo e($Station_Route->ChineseName); ?></b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="40%">到站時間</td>
                            <td width="40%">停留時間</td>
                            <td width="20%">票價</td>
                        </tr>
                        <tr>
                            <td><input type="number" name="ArrivalTime[]" min="0" value="0"></td>
                            <td><input type="number" name="StayTime[]" min="0" value="0"></td>
                            <td><input type="number" name="Fare[]" min="0" value="0"></td>
                        </tr>
                    </tbody>
                </table>
            <?php }?>
            
            <div class="form1_button">
                <button type="submit" class="button1">新增</button>
            </div>
        </form>
    <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>