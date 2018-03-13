@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1><img src="{{ asset("images/logo2.png") }}" alt="KANJIHELPER"></h1>
                <a href="{{ route('rests.create') }}" class="btn btn-success btn-lg">お店を探す</a>
                <a href="" class="btn btn-success btn-lg">カラオケ店検索</a>
                <a href="" class="btn btn-success btn-lg">割り勘電卓</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    テスト
@endsection