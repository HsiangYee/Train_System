@extends('layouts.admin')
@section('main')
    <div class="form1">
        @if(Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('admin.station.update', ['id' => $Station->id]) }}" method="post">
            {{ method_field('PATCH') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>中文名稱</label> <br>
            <input type="text" name="ChineseName" value="{{ $Station->ChineseName }}"> <br><p>
            <label>英文名稱</label> <br>
            <input type="text" name="EnglishName" value="{{ $Station->EnglishName }}"> <br><p>
            <label>順序</label> <br>
            <select name="sequence">
                <option value="0">設為第一站</option>
                <?php foreach($Stations as $S){
                    if($S->sequence == $Station->sequence - 1){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    ?>
                    <option value="{{ $S->sequence }}" {{ $selected }}>設為{{ $S->ChineseName }}之後</option>
                <?php } ?>
            </select>
            <div class="form1_button">
                <button class="button1">修改</button>
            </div>
        </form>
    <div>
@endsection