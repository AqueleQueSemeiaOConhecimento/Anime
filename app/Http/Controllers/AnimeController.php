<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;

class AnimeController extends Controller
{
    public function store(Request $request) {
        $anime_creat = new Anime;
        $anime_creat->title = $request->title;
        $anime_creat->description = $request->description;
        $anime_creat->date = $request->date;
        $anime_creat->genero = $request->genero;

        
    // Image Upload
    if($request->hasFile('image') && $request->file('image')->isValid()){

        $request_image = $request->image;

        $extension = $request_image->extension();

        $image_name = md5($request_image->getClientOriginalName() . strtotime('now')) . '.' . $extension;

        $request->image->move(public_path('img/image_tumb'), $image_name);

        $anime_creat->image = $image_name;

    }

    $anime_creat->save();

    return redirect('/')->with('msg', 'Anime criado com Sucesso');
    }

    public function favoritar($id) {
        $user = auth()->user();
        $anime = Anime::findOrFail($id);
    
        // Verificar se o usuário já favoritou este anime
        if ($user->animes()->where('anime_id', $id)->exists()) {
            return redirect('/')->with('msg', 'Você já favoritou este anime.');
        }
    
        $user->animes()->attach($id);
    
        return redirect('/')->with('msg', 'Anime favoritado com sucesso.');
    }
    

    public function leaveAnime($id) {
            $user = auth()->user();
        
            $user->animes()->detach($id);
        
            $anime = Anime::findOrFail($id);
        
            return redirect('/')->with('msg', 'Você saiu com sucesso do evento ') . $anime->title;
    }

}
