<html>
    <head>
        <title>火車訂票系統</title>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>

    <body>
        <div class="top">
            <nav>
                <div class="text-left">
                    <a href="{{ route('admin.train.index') }}">列車管理</a>
                    <a href="{{ route('admin.station.index') }}">車站管理</a>
                    <a href="#">訂票管理</a>
                    <a href="{{ route('admin.type.index') }}">車種管理</a>
                </div>
                <div class="text-right">
                    <a href="{{ route('login.logout') }}">登出後台</a>
                </div>
            </nav>
        </div>
        
        <div class="main">
            @yield('main')
        </div>

        @yield('js')
    </body>
</html>