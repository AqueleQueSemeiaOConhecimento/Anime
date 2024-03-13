@extends('layouts.main')

@section('title', 'Genero Animes')



@section('content')
    <h1>Gênero dos animes:</h1>
    <form action="#" method="GET">
        @csrf
        <label for="checkboxes">Escolha uma ou mais opções de gênero:</label><br>
        <input type="checkbox" id="option1" name="generos_pesquisados[]" value="Ação">
        <label for="option1">Ação</label><br>
        <input type="checkbox" id="option2" name="generos_pesquisados[]" value="Artes Marciais">
        <label for="option2">Artes Marciais</label><br>
        <input type="checkbox" id="option3" name="generos_pesquisados[]" value="Aventura">
        <label for="option3">Aventura</label><br><br>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
    
<div>








@endsection