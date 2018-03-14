@extends('layouts.app')

@section('content')

    <!--<div>-->
    <!--    <div>都道府県</div>-->
    <!--    @foreach ($prefs as $pref)-->
    <!--    <a href="{{ route('prefs.show', $pref->id) }}">{{ $pref->name }}</a>-->
    <!--    @endforeach-->
    <!--</div>-->
    
    <div class="search">
        <div class="panel panel-default">
            <div class="panel-heading">
                エリアを選択
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </div>
            <div class="panel-body">
                @foreach ($mareas as $marea)
                <a href="{{ route('mareas.show', $marea->id) }}">{{ $marea->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    
    @include('rests.rests', ['rests' => $rests])
@endsection