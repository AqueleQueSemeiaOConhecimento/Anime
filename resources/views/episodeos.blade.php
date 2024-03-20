@extends('layouts.main')

@section('title', 'Animes Pattern')

@section('content')

    <h1>{{$anime->title}}</h1>
    <br>

    @if(auth()->check() && auth()->user()->id === 1)
    <div class="box">
    <a href="/crud_episodeo/{{$anime->id}}" class="btn btn-primary">Add Ep</a>
    </div>
    @endif

    <div class="container mt-5">
        <h1>Episodeos:</h1>
        <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Episódio</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descrição</th>
            @if(auth()->check() && auth()->user()->id === 1)
            <th scope="col">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <!-- Loop para exibir os episódios na tabela -->
        @foreach($episodeos as $episodio)
        <tr>
            <td>
                <a href="/img/episodeos/{{$episodio->video}}" target="_blank">
                    <img src="/img/anime.jpg" class="img-anime">
                </a>
            </td>
            <td>
                {{$episodio->titulo}}
            </td>
            <td>{{ $episodio->description }}</td>
            @if(auth()->check() && auth()->user()->id === 1)
            <td>
                <form action="/episodeos/delete/{{$episodio->id}}" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Excluir
                    </button>
                </form>

                <a href="/edit/episode/{{$episodio->id}}" class="btn btn-success ml-2">
                    <i class="fas fa-edit"></i> <!-- Ícone do botão de edição -->
                    Editar
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
    </div>

@endsection