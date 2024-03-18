@extends('layouts.main')

@section('title', 'Animes Pattern')

@section('content')

    <h1>Animes Favoritados</h1>

    @if($animes_favoritados)
        <div id="cards-container" class="row">
            @foreach($animes_favoritados as $anime)
            <div class="card col-md-3">
                <h4>{{$anime->title}}</h4>
                <img src="/img/image_tumb/{{$anime->image}}"  class="img-box" alt="{{$anime->title}}">
                <br>
                <a href="#" class="btn btn-primary"> Veja agora</a>

                <form action="/anime/desfavoritar/{{$anime->id}}" method="POST">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn">
                    Desfavoritar
                </button>
            </form>
            </div>
            @endforeach
        </div>
    @endif

@endsection