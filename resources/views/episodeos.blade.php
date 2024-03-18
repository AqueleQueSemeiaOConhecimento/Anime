@extends('layouts.main')

@section('title', 'Animes Pattern')

@section('content')

    <h1>{{$anime->title}}</h1>
    <br>

    @if(auth()->check() && auth()->user()->id === 1)
    <a href="/crud_episodeo/{{$anime->id}}" class="btn-box">Add Ep</a>
    @endif

@endsection