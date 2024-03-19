@extends('layouts.main')

@section('title', 'Adicionar Episodeo')

@section('content')



<div id="event-create-container" class="col-md-6 offset-md-3">
    <form method="POST" action="/add/episodeo" enctype="multipart/form-data">
        @csrf
        
            <label for="title">Titulo:</label><br>
            <input type="text" name="titulo" placeholder="Titulo do episodeo" required><br><br>

            <label for="description">Descrição do Episodeo</label> <br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

            <input type="hidden" name="anime_id" value="{{ $anime->id }}">

            <label for="video">Selecione o vídeo:</label><br>
            <input type="file" class="form-control-file" id="video" name="video"><br><br>
        
        <button type="submit" class="btn btn-primary">Enviar Vídeo</button>
    </form>
</div>


@endsection