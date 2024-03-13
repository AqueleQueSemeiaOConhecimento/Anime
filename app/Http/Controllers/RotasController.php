<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

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
        return view('favorito.dashboard');
    }

    public function admin() {
        return view('crud');
    }

    public function genero() {
        return view('genero');
    }

}
