@extends('layouts.main')

@section('title', 'Editar Episodeo')

@section('content')

<h1>Editando o Episodeo {{$episodio->titulo}}</h1>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <form method="POST" action="/editar/ep/{{$episodio->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
            <label for="title">Titulo:</label><br>
            <input type="text" name="titulo" placeholder="Titulo do episodeo" value="{{$episodio->titulo}}"><br><br>

            <label for="description">Descrição do Episodeo</label> <br>
            <textarea id="description" name="description" rows="4" cols="50"  required>{{$episodio->description}}</textarea><br><br>

            <label for="video">Selecione o vídeo:</label><br>
            <input type="file" class="form-control-file" id="video" name="video">
            <br><br>
        
        <button type="submit" class="btn btn-primary">Enviar Vídeo</button>
    </form>
</div>


@endsection