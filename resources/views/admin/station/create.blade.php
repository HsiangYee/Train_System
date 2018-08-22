@extends('layouts.admin')
@section('main')
    <div class="form1">
        @if(Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('admin.station.add') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>中文名稱</label> <br>
            <input type="text" name="ChineseName"> <br><p>
            <label>英文名稱</label> <br>
            <input type="text" name="EnglishName"> <br><p>
            <label>順序</label> <br>
            <select name="sequence">
                <option value="0">設為第一站</option>
                <?php foreach($Stations as $Station){?>
                    <option value="{{ $Station->sequence }}">設為{{ $Station->ChineseName }}之後</option>
                <?php } ?>
            </select>
            <div class="form1_button">
                <button class="button1">新增</button>
            </div>
        </form>
    <div>
@endsection