@extends('layouts.main')

@section('title', 'Animes Pattern')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div id="search-container" class="col-md-12">
    <h1>Busque um Anime: </h1>
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
    <br>
    <br>
    <br>
    <br>
    
    
    <div id="cards-container" class="row">
        @foreach($animes as $anime)
        <div class="card col-md-3">
            <h3>{{$anime->title}}</h3>
            <img src="/img/image_tumb/{{$anime->image}}"  class="img-box" alt="{{$anime->title}}">
            <br>
            <form action="/episodeos/{{$anime->id}}" method="GET">
                @csrf   
                <a href="/episodeos/{{$anime->id}}" 
                class="btn btn-primary" 
                id="event-submit"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Veja mais</a>
            </form>


            <form action="/anime/favoritar/{{$anime->id}}" method="POST">
                @csrf   
                <a href="/anime/favoritar/{{$anime->id}}" 
                class="btn btn-green" 
                id="event-submit"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Favoritar</a>
            </form>
        </div>
        @endforeach
    </div>
@endsection