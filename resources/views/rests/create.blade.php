@extends('layouts.app')

@section('content')

    <div class="search">
        <div class="panel panel-default">
            <div class="panel-heading">
                都道府県を選択
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </div>
            <div class="panel-body">
                @foreach ($prefs as $pref)
                <a href="{{ route('prefs.show', $pref->id) }}">{{ $pref->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    
    <!--<div>-->
    <!--    <div>Mエリア</div>-->
    <!--    @foreach ($mareas as $marea)-->
    <!--    <a href="{{ route('mareas.show', $marea->id) }}">{{ $marea->name }}</a>-->
    <!--    @endforeach-->
    <!--</div>-->

    @include('rests.rests', ['rests' => $rests])
@endsection