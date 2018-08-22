<?php $__env->startSection('main'); ?>
    <div class="form1">
        <?php if(Session::has('error')): ?>
            <div class="error">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.train.route')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <label>列車代號</label> <br>
            <input type="number" name="TrainNumber" min="0"> <br><p>

            <label>發車星期</label> <br>
            <select name="date">
                <?php for($i = 0 ; $i < count($Dates);  $i ++){ ?>
                    <option value="<?php echo e($i); ?>">星期<?php echo e($Dates[$i]); ?></option>
                <?php } ?>
            </select> <br> <p>

            <label>發車時間</label> <br>
            <input type="time" name="time" > <br><p>

            <label>車種</label> <br>
            <select name="Type">
                <?php foreach($Types as $Type){?>
                    <option value="<?php echo e($Type->id); ?>"><?php echo e($Type->TypeName); ?></option>
                <?php }?>
            </select> <br><p>

            <label>單一車廂載客數</label> <br>
            <input type="number" id="SingleCarNumber" name="SingleCarNumber" min="0" value="0"> <br><p>

            <label>車廂數</label> <br>
            <input type="number" id="CarNumber" name="CarNumber" min="0" value="0"> <br><p>

            <label>總人數</label> <br>
            <input type="number" id="TotalNumber" name="TotalNumber" value="0" readonly="true" class="readonly"> <br><p>

            <label>發車站</label> <br>
            <select name="StartStation">
                <?php foreach($Stations as $Station){?>
                    <option value="<?php echo e($Station->id); ?>"><?php echo e($Station->ChineseName); ?></option>
                <?php }?>
            </select> <br><p>

            <label>終點站</label> <br>
            <select name="EndStation">
                <?php foreach($Stations as $Station){?>
                    <option value="<?php echo e($Station->id); ?>"><?php echo e($Station->ChineseName); ?></option>
                <?php }?>
            </select> <br><p>

            <div class="form1_button">
                <button type="submit" class="button1">下一步</button>
            </div>
        </form>
    <div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        var SingleCarNumber = document.getElementById("SingleCarNumber");
        var CarNumber = document.getElementById("CarNumber");
        var TotalNumber = document.getElementById("TotalNumber");

        SingleCarNumber.onchange = function(){
            var total = SingleCarNumber.value * CarNumber.value;
            TotalNumber.value = total;
        }

        CarNumber.onchange = function(){
            var total = SingleCarNumber.value * CarNumber.value;
            TotalNumber.value = total;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>