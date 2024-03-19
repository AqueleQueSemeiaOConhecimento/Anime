<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- Fonte do Google --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Honk:MORF,SHLN@44,100&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">

        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- CSS && JS --}}
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/script.js"></script>

    </head>
    <body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bottom" >
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/logo.jpg"  class="logo" alt="Animes Parttern">
                </a>
                
                <ul class="navbar-nav">
                    <!-- Retorna pro inicio -->
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>

                    <!-- Animes Favoritados pelo usuario logado -->
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Favoritos</a>
                    </li>

                    <!-- Os gênero dos animes -->
                    <li class="nav-item">
                        <a href="/genero/anime" class="nav-link">Gêneros</a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" 
                            class="nav-link" 
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                    
                    <li class="nav-item">
                        @if(auth()->check() && auth()->user()->id === 1)
                        <a href="/admin" class="nav-link">
                            Admin</a>
                        @endif
                    </li>
                    @endauth
                    
                
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            @if(session('msg'))
                <p class="msg"> {{session('msg')}} </p>
            @endif
            @yield('content')
        </div>
    </main>
    <footer>
        <p>Animes Pattern &copy; 2024</p>    
    </footer>
    <script src="https://kit.fontawesome.com/e7a90907a8.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>