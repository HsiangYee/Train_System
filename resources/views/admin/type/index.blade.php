@extends('layouts.admin')
@section('main')
    <div class="button_area">
        <a href="{{ route('admin.type.create') }}" class="button1">新增車種</a>
    </div>

    @if(Session::has('success'))
        <div class="success">
            {{ Session::get('success') }}
        </div>
    @endif

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
                    <td>#{{ $Type->id }}</td>
                    <td>{{ $Type->TypeName }}</td>
                    <td>{{ $Type->HightSpeed }}</td>
                    <td>
                        <form action="{{ route('admin.type.delete', ['id' => $Type->id]) }}" method="post">
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{ route('admin.type.edit', ['id' => $Type->id]) }}" class="button1">修改</a>
                            <button type="submit" class="button2" onclick="return confirm('確定刪除?')">刪除</button>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
@endsection