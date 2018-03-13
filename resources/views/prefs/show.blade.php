@extends('layouts.app')

@section('content')
    <div>
        <div>都道府県マスタ</div>
        @foreach ($prefs as $pref)
        <a href="{{ route('prefs.show', $pref->id) }}">{{ $pref->name }}</a>
        @endforeach
    </div>
    
    @include('rests.rests', ['rests' => $rests])
@endsection