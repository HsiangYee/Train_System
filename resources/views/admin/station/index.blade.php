@extends('layouts.admin')
@section('main')
    <div class="button_area">
        <a href="{{ route('admin.station.create') }}" class="button1">新增車站</a>
    </div>

    @if(Session::has('success'))
        <div class="success">
            {{ Session::get('success') }}
        </div>
    @endif

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
                    <td>#{{ $Station->sequence }}</td>
                    <td>{{ $Station->ChineseName }}</td>
                    <td>{{ $Station->EnglishName }}</td>
                    <td>
                        
                        <form action="{{ route('admin.station.delete', ['id' => $Station -> id]) }}" method="post">
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{ route('admin.station.edit', ['id' => $Station->id ]) }}" class="button1">修改</a>
                            <button type="submit" class="button2" onclick="return confirm('確定刪除?')">刪除</button>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
@endsection