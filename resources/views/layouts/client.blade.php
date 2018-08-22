<html>
    <head>
        <title>火車訂票系統</title>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
                    <a href="{{ route('login.index') }}">登入後台</a>
                </div>
            </nav>
        </div>
        
        <div class="main">
            @yield('main')
        </div>
    </body>
</html>