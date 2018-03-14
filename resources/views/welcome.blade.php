@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1><img src="{{ asset("images/logo2.png") }}" alt="KANJIHELPER"></h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-sm-4"><a href="{{ route('rests.create') }}" class="btn btn-primary btn-lg">お店を探す</a></div>
            <div class="col-sm-4"><a href="" class="btn btn-primary btn-lg">カラオケ店検索</a></div>
            <div class="col-sm-4"><a href="" class="btn btn-primary btn-lg">割り勘電卓</a></div>
        </div>
    </div>
@endsection