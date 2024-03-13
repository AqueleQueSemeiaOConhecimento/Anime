@extends('layouts.main')

@section('title', 'Animes Pattern')

@section('content')

    <h1>Animes:</h1>

    <div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        @csrf
        <input type="text" id="search" name="search" class="form-controll" placeholder="Procurar...">
    </form>
    </div>
    <div class="events-container">
        @if($search)
            <h2>Buscando por: {{$search}}</h2>
        @endif
    </div>
    
    
    <div id="cards-container" class="row">
        @foreach($animes as $anime)
        <div class="card col-md-3">
            <h4>{{$anime->title}}</h4>
            <img src="/img/image_tumb/{{$anime->image}}"  class="img-box" alt="{{$anime->title}}">
            <br>
            <a href="#"> Veja agora</a>
        </div>
        @endforeach
    </div>
@endsection