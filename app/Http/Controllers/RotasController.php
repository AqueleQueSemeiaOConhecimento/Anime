<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;

class RotasController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $animes = Anime::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }
        else{
            $animes = Anime::all();
        }


        return view('welcome', ['animes' => $animes, 'search' => $search]);
    }

    public function favorito() {
        $user = auth()->user();

        $animes_favoritados = $user->animes;

        return view('favorito.dashboard', ['animes_favoritados' => $animes_favoritados]);
    }


    // public function dashboard() {
    //     $user = auth()->user();
    
    //     $events = $user->events;
    
    //     $eventAsParticipant = $user->eventAsParticipant;
    
    //     return view('events.dashboard', ['events' => $events, 'eventasparticipant' => $eventAsParticipant]);
    // }


    public function admin() {
        return view('crud');
    }

    public function genero() {
        $get_generos = request('generos_pesquisados');
    
        if ($get_generos) {
            // Inicializa a consulta com todos os animes
            $consulta = Anime::query();
    
            // Itera sobre os gêneros solicitados
            foreach ($get_generos as $genero) {
                // Adiciona uma condição para cada gênero usando whereJsonContains
                $consulta->whereJsonContains('genero', $genero);
            }
    
            // Executa a consulta e retorna os resultados
            $animes_com_genero = $consulta->get();
            return view('genero', ['generos_search' => $animes_com_genero]);
        } else {
            return view('genero', ['generos_search' => false]);
        }
    }


}
