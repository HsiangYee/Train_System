<html>
    <head>
        <title>火車訂票系統</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    </head>

    <body>
        <div class="top">
            <nav>
                <div class="text-left">
                    <a href="#">首頁</a>
                    <a href="#">預訂車票</a>
                    <a href="#">訂票查詢</a>
                    <a href="#">列車資訊</a>
                </div>
                <div class="text-right">
                    <a href="<?php echo e(route('login.index')); ?>">登入後台</a>
                </div>
            </nav>
        </div>
        
        <div class="main">
            <?php echo $__env->yieldContent('main'); ?>
        </div>
    </body>
</html>