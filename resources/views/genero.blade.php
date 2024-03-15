@extends('layouts.main')

@section('title', 'Genero Animes')



@section('content')
    <h1>Gênero dos animes:</h1>
    <form action="/genero/anime" method="GET">
        @csrf
        <label for="checkboxes">Escolha uma ou mais opções de gênero:</label><br>
        <input type="checkbox" id="option1" name="generos_pesquisados[]" value="Ação">
        <label for="option1">Ação</label><br>
        <input type="checkbox" id="option2" name="generos_pesquisados[]" value="Artes Marciais">
        <label for="option2">Artes Marciais</label><br>
        <input type="checkbox" id="option3" name="generos_pesquisados[]" value="Aventura">
        <label for="option3">Aventura</label><br>
        <input type="checkbox" id="option4" name="generos_pesquisados[]" value="Comédia">
        <label for="option4">Comédia</label><br><br>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
    
    @if($generos_search):
        <div id="cards-container" class="row">
        @foreach($generos_search as $anime)
        <div class="card col-md-3">
            <h4>{{$anime->title}}</h4>
            <img src="/img/image_tumb/{{$anime->image}}"  class="img-box" alt="{{$anime->title}}">
            <br>
            <a href="#"> Veja agora</a>
        </div>
        @endforeach
    </div>
    @endif
    

<div>








@endsection