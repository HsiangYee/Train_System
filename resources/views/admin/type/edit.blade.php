@extends('layouts.admin')
@section('main')
    <div class="form1">
        @if(Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('admin.type.update', ['id' => $Type->id]) }}" method="post">
            {{ method_field('PATCH') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>車種名稱</label> <br>
            <input type="text" name="TypeName" value="{{ $Type->TypeName }}"> <br><p>
            <label>最高時速(km/h)</label> <br>
            <input type="number" name="HightSpeed" min="0" value="{{ $Type->HightSpeed }}"> <br><p>

            <div class="form1_button">
                <button class="button1">修改</button>
            </div>
        </form>
    <div>
@endsection