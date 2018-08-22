@extends('layouts.client')
@section('main')
    <div class="form1">
        @if(Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('login.login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>帳號</label> <br>
            <input type="text" name="acc"> <br><p>
            <label>密碼</label> <br>
            <input type="password" name="pass"> <br><p>

            <div class="form1_button">
                <button class="button1">登入</button>
            </div>
        </form>
    <div>
@endsection