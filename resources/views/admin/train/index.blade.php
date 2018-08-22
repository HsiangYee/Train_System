@extends('layouts.admin')
@section('main')
    <div class="button_area">
        <a href="{{ route('admin.train.create') }}" class="button1">新增列車</a>
    </div>

    @if(Session::has('success'))
        <div class="success">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection