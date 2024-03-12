@extends('layouts.main')

@section('title', 'Criar Anime')

@section('content')

    <h1>Criar anime</h1>
    <div id="event-create-container" class="col-md-6 offset-md-3">
    <form action="/store/anime" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Descrição:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="date">Data:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="checkboxes">Escolha uma ou mais opções de gênero:</label><br>
        <input type="checkbox" id="option1" name="genero[]" value="Ação">
        <label for="option1">Ação</label><br>
        <input type="checkbox" id="option2" name="genero[]" value="Artes Marciais">
        <label for="option2">Artes Marciais</label><br>
        <input type="checkbox" id="option3" name="genero[]" value="Aventura">
        <label for="option3">Aventura</label><br><br>

        <label for="image">Imagem:</label>
        <input type="file" id="image" name="image" accept="image/*">br
        <button type="submit" class="btn btn-primary">Criar anime</button>
    </form>
    </div>

@endsection