<html>
    <head>
        <title>火車訂票系統</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    </head>

    <body>
        <div class="top">
            <nav>
                <div class="text-left">
                    <a href="<?php echo e(route('admin.train.index')); ?>">列車管理</a>
                    <a href="<?php echo e(route('admin.station.index')); ?>">車站管理</a>
                    <a href="#">訂票管理</a>
                    <a href="<?php echo e(route('admin.type.index')); ?>">車種管理</a>
                </div>
                <div class="text-right">
                    <a href="<?php echo e(route('login.logout')); ?>">登出後台</a>
                </div>
            </nav>
        </div>
        
        <div class="main">
            <?php echo $__env->yieldContent('main'); ?>
        </div>

        <?php echo $__env->yieldContent('js'); ?>
    </body>
</html>